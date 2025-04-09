<?php

namespace App\Http\Controllers\Webs\Registers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Registers\RegisterRequest;
use App\Models\User;
use App\Services\Register\RegisterService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct(private RegisterService $registerService) {}
    public function create()
    {
        return view('registers.register');
    }

    public function store(RegisterRequest $request)
    {
        $request = $request->validated();
        $request['rule'] = User::ROLE_ADMIN;
        $this->registerService->register($request);
        return redirect(route('auth.login'));
    }
}
