<?php

namespace App\Services\Schedules;

use App\Repositories\Schedules\ScheduleRepository;

class ScheduleService
{

    public function __construct(private ScheduleRepository $scheduleRepository) {}

    public function dataSchedule($data)
    {
        return $this->scheduleRepository->getAllSchedulesByUser($data['userId']);
    }

    public function storeSchedule($data)
    {
        return $this->scheduleRepository->storeSchedule([
            'user_id' => $data['userId'],
            'day' => $data['day'],
            'time' => $data['time']
        ]);
    }

    public function updateSchedule($data)
    {
        return $this->scheduleRepository->updateScheduleById([
            'user_id' => $data['userId'],
            'day' => $data['day'],
            'time' => $data['time']
        ], $data['id']);
    }

    public function deleteSchedule($data)
    {
        return $this->scheduleRepository->deleteSchedule($data);
    }

    public function getSchedule($data)
    {
        return $this->scheduleRepository->getScheduleById($data['id']);
    }
}
