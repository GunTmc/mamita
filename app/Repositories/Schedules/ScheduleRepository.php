<?php

namespace App\Repositories\Schedules;

use App\Models\Schedule;

class ScheduleRepository
{
    public function getAllSchedulesByUser($userId)
    {
        return Schedule::where('user_id', $userId)->get();
    }

    public function storeSchedule($data)
    {
        return Schedule::create($data);
    }

    public function updateScheduleById($data, $id)
    {
        return Schedule::where('id', $id)->update($data);
    }

    public function deleteSchedule($data)
    {
        return Schedule::where('id', $data['id'])->delete();
    }

    public function getScheduleById($id)
    {
        return Schedule::where('id', $id)->first();
    }
}
