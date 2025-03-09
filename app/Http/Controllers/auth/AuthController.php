<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\addressRequest;
use App\Http\Requests\userRequest;
use App\Mail\RegisterMail;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    use apiResponse;

    public function register(userRequest $request)
    {
        $fields = $request->validated();
        $user = $fields;
        $user['password'] = bcrypt($user['password']);
        $user = User::create($user);
        if (!$user) {
            return $this->sendError('Register Failed');
        }
        Mail::to(Auth::user()->email)->send(new RegisterMail());
        return $this->apiResponse($user, __('messages.register'));
    }

    public function login()
    {
        $token=auth()->attempt(request(['email', 'password']));
        if (!$token) {
            return $this->sendError(__('messages.Error_login'), ['error'=>__('messages.Error_login')]);
        }
        $success = $this->respondWithToken($token);

        return $this->apiResponse($success->original, __('messages.login'));
    }
    public function profile()
    {
        $user=auth()->user();
        if(!$user){
            return $this->sendError('User Not Found');
        }
        return $this->apiResponse($user->load('addresses'), 'Profile');
    }

    public function logout()
    {
        auth()->logout();

        return $this->apiResponse([],__('messages.logout'));
    }

    public function refresh()
    {
        $token = $this->respondWithToken(auth()->refresh());
        return $this->apiResponse($token->original, 'Refresh Successfully');
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function addAddress(addressRequest $request)
    {
        $fields = $request->validated();
        $data=UserAddress::create([
            'address' => $fields['address'],
            'city' => $fields['city'],
            'zip_code' => $fields['zip_code'],
            'user_id' => Auth::user()->id
        ]);
        if(!$data){
            return $this->sendError('user Not Found');
        }
        return $this->apiResponse($data, 'Address Added Successfully');
    }
}
