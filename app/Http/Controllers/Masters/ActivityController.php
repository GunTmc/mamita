<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use App\Http\Requests\Activity\DeleteActivityRequest;
use App\Http\Requests\Activity\EditActivityRequest;
use App\Http\Requests\Activity\StoreActivityRequest;
use App\Http\Requests\Activity\UpdateActivityRequest;
use App\Models\Activity;
use App\Services\Masters\ActivityService;

class ActivityController extends Controller
{
    public function __construct(private ActivityService $activityService) {}

    public function index()
    {
        return view('masters.activity.index', [
            'activities' => $this->activityService->dataActivities([])->get(),
            'title' => 'Activity'
        ]);
    }

    public function create()
    {
        return view('masters.activity.create', [
            'categories' => Activity::CATEGORY_AVAILABLE
        ]);
    }

    public function store(StoreActivityRequest $storeActivityRequest)
    {
        $request = $storeActivityRequest->validated();
        $this->activityService->storeActivity($request);
        return redirect()->route('activity.index');
    }
    public function edit(EditActivityRequest $editActivityRequest)
    {
        return view('masters.activity.edit', [
            'activity' => $this->activityService->getActivity($editActivityRequest->validated()),
            'categories' => Activity::CATEGORY_AVAILABLE
        ]);
    }

    public function update(UpdateActivityRequest $updateActivityRequest)
    {
        $request = $updateActivityRequest->validated();
        $this->activityService->updateActivity($request);
        return redirect()->route('activity.index');
    }

    public function destroy(DeleteActivityRequest $deleteActivityRequest)
    {
        $request = $deleteActivityRequest->validated();
        $this->activityService->deleteActivity($request);
        return redirect()->route('activity.index');
    }
}
