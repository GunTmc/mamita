<?php

namespace App\Http\Controllers\API\Registers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Registers\ApiRegisterRequest;
use App\Models\User;
use App\Services\Register\RegisterService;

class RegisterController extends Controller
{
    public function __construct(private RegisterService $registerService) {}

    public function register(ApiRegisterRequest $request)
    {
        $request = $request->validated();
        $request['rule'] = User::ROLE_USER;
        $this->registerService->register($request);
        return response()->json([
            'status' => 'success',
            'message' => 'Register successfully',
            'data' => null
        ]);
    }
}
