<?php

namespace App\Http\Controllers\web\home;

use App\Http\Controllers\Controller;
use App\Interfaces\CoursesInterface;
use App\Interfaces\EnrollmentsInterface;
use App\Interfaces\PaymentInterface;

class enrollmentContoller extends Controller
{
    private $enrollmentRepository;
    private $courseRepository;
    private $paymentRepository;
    public function __construct(EnrollmentsInterface $enrollmentRepository,CoursesInterface $courseRepository,PaymentInterface $paymentRepository)
    {
        $this->enrollmentRepository = $enrollmentRepository;
        $this->courseRepository = $courseRepository;
        $this->paymentRepository = $paymentRepository;
    }
    public function index()
    {
        $enrollments = $this->enrollmentRepository->index(request('id'));
        return view('admin.enrollments.index', compact('enrollments'));
    }

    public function pay()
    {
        $course=$this->courseRepository->getCourse(request('id'));
        $price=$course->price;
        $enrollment=$this->enrollmentRepository->store(request('id'),$price);
        $paymentKey=$this->paymentRepository->pay($enrollment);
        return redirect("https://accept.paymob.com/api/acceptance/iframes/901393?payment_token=" . $paymentKey);
    }

    public function callback()
    {
        $this->paymentRepository->callBack(request()->all());
    }

    public function response()
    {
        $this->paymentRepository->callBack(request()->all());
        $data=request()->all();
        if($data['success'] == 'true'){
            return view('courses.enrollments.success');
        }
        return view('courses.enrollments.failed');
    }


}
