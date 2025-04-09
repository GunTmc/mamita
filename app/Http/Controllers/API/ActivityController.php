<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\Masters\ActivityService;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    public function __construct(private ActivityService $activityService) {}

    public function index()
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Activity',
            'data' => $this->activityService->dataActivities([])->get()->map(function ($activity) {
                return [
                    'id' => $activity->id,
                    'name' => $activity->name,
                    'description' => $activity->description,
                    'category' => $activity->category,
                    'created_at' => $activity->created_at->format('Y-m-d H:i:s'),
                    'updated_at' => $activity->updated_at->format('Y-m-d H:i:s'),
                    'image' => Storage::url($activity->image)
                ];
            })->toArray()
        ]);
    }
}
