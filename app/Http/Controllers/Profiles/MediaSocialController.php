<?php

namespace App\Http\Controllers\Profiles;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\MediaSocialUpdateRequest;
use App\Services\Users\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MediaSocialController extends Controller
{
    public function __construct(private UserService $userService) {}

    public function show(): View
    {
        return view('profile.mediaSocial', [
            'user' => Auth::user(),
            'title' => 'Edit Media Social'
        ]);
    }

    public function edit($mediaSocial): View
    {
        return view('profile.editMediaSocial', [
            'mediaSocial' => [
                'name' => $mediaSocial,
                'value' => Auth::user()->$mediaSocial
            ]
        ]);
    }

    public function update(MediaSocialUpdateRequest $request)
    {
        $data = $request->validated();
        $this->userService->updateUser($data);
        return redirect()->route('profile.media-social.show');
    }
}
