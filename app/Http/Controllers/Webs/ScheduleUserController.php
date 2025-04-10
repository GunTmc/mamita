<?php

namespace App\Http\Controllers\Webs;

use App\Http\Controllers\Controller;
use App\Http\Requests\Schedules\WebScheduleUserRequest;
use App\Repositories\Schedules\ScheduleUserRepository;

class ScheduleUserController extends Controller
{

    public function __construct(private ScheduleUserRepository $scheduleUserRepository) {}

    public function index($userId, $type)
    {
        return view('schedules.users.index', [
            'schedules' => $this->scheduleUserRepository->getAllScheduleUsersByUsersId($userId)->where('type', $type)->get(),
            'userId' => $userId,
            'type' => $type,
            'title' => 'Jadwal ' . ($type == 'child' ? 'Imuniasi' : 'Konsultasi')
        ]);
    }

    public function create($userId, $type)
    {
        return view('schedules.users.create', [
            'userId' => $userId,
            'type' => $type
        ]);
    }

    public function edit($userId, $type, $id)
    {
        return view('schedules.users.edit', [
            'schedule' => $this->scheduleUserRepository->getScheduleUserById($id),
            'userId' => $userId,
            'type' => $type
        ]);
    }

    public function store(WebScheduleUserRequest $request, $userId, $type)
    {
        $data = $request->validated();
        $this->scheduleUserRepository->createScheduleUser([
            'user_id' => $userId,
            'type' => $type,
            'date' => $data['date'],
            'status' => $data['status'] ?? null,
            'note' => $data['note'] ?? null
        ]);

        return redirect()->route('schedules.user.index', ['userId' => $userId, 'type' => $type]);
    }

    public function update(WebScheduleUserRequest $request, $userId, $type, $id)
    {
        $data = $request->validated();
        $this->scheduleUserRepository->updateScheduleUserById($id, [
            'date' => $data['date'],
            'status' => $data['status'] ?? null,
            'note' => $data['note'] ?? null
        ]);

        return redirect()->route('schedules.user.index', ['userId' => $userId, 'type' => $type]);
    }

    public function destroy($userId, $type, $id)
    {
        $this->scheduleUserRepository->deleteScheduleUserById($id);
        return redirect()->route('schedules.user.index', ['userId' => $userId, 'type' => $type]);
    }
}
