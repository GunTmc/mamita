<?php

namespace App\Services\Dashboards;

use App\Repositories\Users\UserRepository;

class DashboardService
{
    public function __construct(private UserRepository $userRepository) {}

    public function getDataDashboard($data)
    {
        return $this->userRepository->getAllUserAdmins($data);
    }
    public function getDataDashboardUserAdmin($data)
    {
        return $this->userRepository->getAllUserUsers($data);
    }
}
