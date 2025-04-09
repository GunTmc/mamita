<?php

namespace App\Repositories\Masters\Activities;

use App\Models\Activity;

class ActivityRepository
{
    public function getAllActivities($params)
    {
        return Activity::orderBy('name', 'asc');
    }

    public function getActivityById($id)
    {
        return Activity::find($id);
    }

    public function updateActivityById($data, $id)
    {
        return Activity::where('id', $id)->update($data);
    }

    public function deleteActivityById($id)
    {
        return Activity::where('id', $id)->delete();
    }

    public function create($data)
    {
        return Activity::create($data);
    }
}
