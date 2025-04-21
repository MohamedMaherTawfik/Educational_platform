<?php

namespace App\Repository;

use App\Interfaces\CoursesInterface;
use App\Interfaces\paymentInterface;
use App\Models\Enrollments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PaymentRepository implements paymentInterface
{
    private $apiKey;
    private $baseUrl;
    private $courseRepository;
    private $integrationId;
    public function __construct(CoursesInterface $courseRepository)
    {
        $this->apiKey = config('services.paymob.api_key');
        $this->baseUrl = 'https://accept.paymob.com/api';
        $this->integrationId = config('services.paymob.integration_id');
        $this->courseRepository = $courseRepository;
    }


    public function pay($enrollment)
    {
        $id=$enrollment->id;
        $total=$enrollment->price;

        // Step 1: Generate auth token
        $authResponse = Http::post("{$this->baseUrl}/auth/tokens", [
            'api_key' => $this->apiKey,
        ]);

        $authToken = $authResponse->json('token');

        // dd($authToken,$id,$total,);

        // Step 2: Create order
        $enrollmentResponse = Http::post("{$this->baseUrl}/ecommerce/orders", [
            'auth_token' => $authToken,
            'amount_cents' => (int) ($total * 100),
            'currency' => 'EGP',
            'merchant_order_id' => $id,
            'items' => [
                [
                    'name' => 'Course',
                    'amount_cents' => (int) ($total * 100),
                    'quantity' => 1,
                ]
            ]
        ]);

        // dd($enrollmentResponse->json());
        $enrollmentId = $enrollmentResponse->json('id');
        // dd($enrollmentResponse
        // ->json());

        // Step 3: Generate payment key
        $paymentKeyResponse = Http::post("{$this->baseUrl}/acceptance/payment_keys", [
            'auth_token' => $authToken,
            'amount_cents' => (int) ($total * 100),
            'expiration' => 3600,
            'order_id' => $enrollmentId,
            'billing_data' => [
                "apartment" => "1",
                "email" => Auth::user()->email,
                "floor" => "1",
                "first_name" => Auth::user()->username,
                "last_name" => Auth::user()->username,
                "street" => "123 Main St",
                "building" => "6",
                "phone_number" => Auth::user()->phone,
                "shipping_method" => "1",
                "postal_code" => "12345",
                "city" => "Anytown",
                "country" => "Egypt",
                "state" => "Dakahliyah"
            ],
            'currency' => 'EGP',
            'integration_id' => config('services.paymob.integration_id'),
        ]);

        return $paymentKeyResponse->json('token');
    }

    public function callBack($requestData)
    {
        Log::info('Paymob Callback Data:', $requestData);

        if (isset($requestData['success']) && $requestData['success'] == 'true') {
            $enrollment = Enrollments::where('id', $requestData['merchant_order_id'])->first();

            if ($enrollment) {
                $enrollment->update([
                'transaction_status' => 'paid',
                'transaction_type'=>'online',
                'transaction_id' => $requestData['id'],
                'enrolled'=>'yes',
                ]);
                return $enrollment;
            }
        }

        return null;
    }
}
