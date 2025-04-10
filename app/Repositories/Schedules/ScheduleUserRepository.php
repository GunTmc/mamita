<?php

namespace App\Repositories\Schedules;

use App\Models\ScheduleUser;


class ScheduleUserRepository
{
    public function getAllScheduleUsersByUsersId($userId)
    {
        return ScheduleUser::where('user_id', $userId);
    }

    public function getScheduleUserById($id)
    {
        return ScheduleUser::where('id', $id)->first();
    }

    public function createScheduleUser($data)
    {
        return ScheduleUser::create($data);
    }

    public function updateScheduleUserById($id, $data)
    {
        return ScheduleUser::where('id', $id)->update($data);
    }

    public function deleteScheduleUserById($id)
    {
        return ScheduleUser::where('id', $id)->delete();
    }
}
