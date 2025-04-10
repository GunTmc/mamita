<?php

namespace App\Http\Controllers\Webs;

use App\Http\Controllers\Controller;
use App\Http\Requests\DashboardRequest;
use App\Models\User;
use App\Services\Dashboards\DashboardService;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct(private DashboardService $dashboardService) {}
    public function __invoke(DashboardRequest $dashboardRequest)
    {
        $request = $dashboardRequest->validated();

        $user =  Auth::user();
        if ($user->rule == User::ROLE_SUPER_ADMIN) {
            return view('dashboard', [
                'title' => 'Dashboard',
                'users' => $this->dashboardService->getDataDashboard($request)->get()
            ]);
        } else {
            return view('dashboardHealthcare', [
                'title' => 'Dashboard',
                'users' => $this->dashboardService->getDataDashboardUserAdmin($request)->get()
            ]);
        }
    }
}
