<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\Schedules\ScheduleUserRepository;

class ScheduleUserController extends Controller
{

    public function __construct(private ScheduleUserRepository $scheduleUserRepository) {}

    public function index($type)
    {
        return response()->json([
            'status' => true,
            'message' => 'Success get data schedule user',
            'data' => $this->scheduleUserRepository->getAllScheduleUsersByUsersId(request()->user()->id)->where('type', $type)->get()
                ->map(function ($scheduleUser) {
                    return [
                        'id' => $scheduleUser->id,
                        'date' => $scheduleUser->date,
                        'status' => $scheduleUser->status,
                        'note' => $scheduleUser->note,
                        'created_at' => $scheduleUser->created_at->format('Y-m-d H:i:s'),
                        'updated_at' => $scheduleUser->updated_at->format('Y-m-d H:i:s')
                    ];
                })->toArray()
        ]);
    }

    public function update($id)
    {
        $scheduleUser = $this->scheduleUserRepository->getScheduleUserById($id);
        if ($scheduleUser) {
            $this->scheduleUserRepository->updateScheduleUserById($id, ['status' => 'Telah Mendaftar']);
            return response()->json([
                'status' => true,
                'message' => 'Success update schedule user',
                'data' => null
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Schedule user not found',
                'data' => null
            ])->setStatusCode(400);
        }
    }
}
