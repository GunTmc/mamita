<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\DestroyUserRequest;
use App\Http\Requests\Users\ShowUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\User;
use App\Services\Users\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function __construct(private UserService $userService) {}

    public function show(ShowUserRequest $showUserRequest)
    {
        $data = $showUserRequest->validated();
        $user =  Auth::user();
        if ($user->rule == User::ROLE_SUPER_ADMIN) {
            return view('users.user', [
                'user' => $this->userService->getUser($data)
            ]);
        } else {
            return view('users.userHealthCare', [
                'user' => $this->userService->getUser($data)
            ]);
        }
    }

    public function update(UpdateUserRequest $request)
    {
        $data = $request->validated();
        $this->userService->updateUser($data);
        return redirect()->route('user.show', ['id' => $data['id']]);
    }

    public function destroy(DestroyUserRequest $request)
    {
        $data = $request->validated();
        $this->userService->deleteUser($data);
        return redirect()->route('home');
    }
}
