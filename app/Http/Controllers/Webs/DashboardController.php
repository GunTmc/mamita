<?php

namespace App\Http\Controllers\Webs;

use App\Http\Controllers\Controller;
use App\Http\Requests\DashboardRequest;
use App\Services\Dashboards\DashboardService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(private DashboardService $dashboardService) {}
    public function __invoke(DashboardRequest $dashboardRequest)
    {
        $request = $dashboardRequest->validated();

        return view('dashboard', [
            'title' => 'Dashboard',
            'users' => $this->dashboardService->getDataDashboard($request)->get()
        ]);
    }
}
