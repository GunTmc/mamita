<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\Masters\ArticleService;
use App\Services\Schedules\ScheduleService;
use App\Services\Users\UserService;
use Illuminate\Support\Facades\Storage;

class HealthCareController extends Controller
{
    public function __construct(
        private UserService $userService,
        private ScheduleService $scheduleService,
        private ArticleService $articleService
    ) {}

    public function index()
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Health Care',
            'data' => $this->userService->dataUsers([])->get()->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->healthcare_name,
                    'address' => $user->healthcare_address,
                    'image' => Storage::url($user->image)
                ];
            })->toArray()
        ]);
    }

    public function show($id)
    {
        $user = $this->userService->getUser(['id' => $id]);

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'Health Care not found',
                'data' => []
            ], 404);
        }

        $news = $this->articleService->dataArticle(['sourceId' => $user->id])->get()->map(function ($article) {
            return [
                'id' => $article->id,
                'title' => $article->title,
                'description' => $article->description,
                'image' => Storage::url($article->image),
                'created_at' => $article->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $article->updated_at->format('Y-m-d H:i:s')
            ];
        })->toArray();

        $schedules = $this->scheduleService->dataSchedule(['userId' => $user->id])->map(function ($schedule) {
            return [
                'id' => $schedule->id,
                'day' => $schedule->day,
                'time' => $schedule->time
            ];
        })->toArray();


        return response()->json([
            'status' => 'success',
            'message' => 'Health Care',
            'data' => [
                'user' => [
                    'id' => $user->id,
                    'name' => $user->healthcare_name,
                    'address' => $user->healthcare_address,
                    'image' => Storage::url($user->image),
                    'phone' => $user->phone,
                    'news' => $news,
                    'schedules' => $schedules
                ]
            ]
        ]);
    }
}
