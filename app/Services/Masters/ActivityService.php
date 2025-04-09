<?php

namespace App\Services\Masters;

use App\Repositories\Masters\Activities\ActivityRepository;
use Illuminate\Support\Facades\Storage;

class ActivityService
{
    public function __construct(private ActivityRepository $activityRepository) {}

    public function dataActivities($data)
    {
        return $this->activityRepository->getAllActivities($data);
    }

    public function storeActivity($data)
    {
        $image = Storage::put('activities', $data['image']);
        return $this->activityRepository->create([
            'name' => $data['name'],
            'description' => $data['description'],
            'image' => $image,
            'category' => $data['category']
        ]);
    }

    public function updateActivity($data): bool
    {
        $activity = $this->activityRepository->getActivityById($data['id']);
        $image = isset($data['image']) ?  Storage::put('Activitys', $data['image']) : $activity->image;
        return $this->activityRepository->updateActivityById([
            'name' => $data['name'],
            'description' => $data['description'],
            'image' => $image,
            'category' => $data['category']
        ], $data['id']);
    }


    public function deleteActivity($data)
    {
        return $this->activityRepository->deleteActivityById($data['id']);
    }

    public function getActivity($data)
    {
        return $this->activityRepository->getActivityById($data['id']);
    }
}
