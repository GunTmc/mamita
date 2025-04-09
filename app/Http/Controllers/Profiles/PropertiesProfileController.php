<?php

namespace App\Http\Controllers\Profiles;

use App\Http\Controllers\Controller;
use App\Services\Users\UserService;

class PropertiesProfileController extends Controller
{
    public function __construct(private UserService $userService) {}

    public function __invoke()
    {
        return view('profile.propertiesProfile', [
            'title' => 'Edit Profile'
        ]);
    }
}
