<?php

namespace App\Http\Controllers\Profiles;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ProfileUpdateRequest;
use App\Services\Users\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function __construct(private UserService $userService) {}

    public function edit(): View
    {
        return view('profile.edit', [
            'user' => Auth::user(),
            'title' => 'Edit Profile'
        ]);
    }

    public function update(ProfileUpdateRequest $request)
    {
        $data = $request->validated();
        $this->userService->updateUser($data);
        return redirect()->route('profile.edit');
    }
}
