<?php

namespace App\Http\Controllers\Schedules;

use App\Http\Controllers\Controller;
use App\Http\Requests\Schedules\EditScheduleRequest;
use App\Http\Requests\Schedules\StoreScheduleRequest;
use App\Http\Requests\Schedules\UpdateScheduleRequest;
use App\Services\Schedules\ScheduleService;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function __construct(private ScheduleService $scheduleService) {}

    public function index()
    {
        return view('schedules.index', [
            'schedules' => $this->scheduleService->dataSchedule(['userId' => Auth::user()->id]),
            'title' => 'Schedule'
        ]);
    }

    public function create()
    {
        return view('schedules.create');
    }

    public function store(StoreScheduleRequest $storeScheduleRequest)
    {
        $request = $storeScheduleRequest->validated();
        $this->scheduleService->storeSchedule($request);
        return redirect()->route('schedule.index');
    }

    public function edit(EditScheduleRequest $editScheduleRequest)
    {
        $request = $editScheduleRequest->validated();
        return view('schedules.edit', ['schedule' => $this->scheduleService->getSchedule($request)]);
    }

    public function update(UpdateScheduleRequest $updateScheduleRequest)
    {
        $request = $updateScheduleRequest->validated();
        $this->scheduleService->updateSchedule($request);
        return redirect()->route('schedule.index');
    }

    public function destroy(EditScheduleRequest $editScheduleRequest)
    {
        $request = $editScheduleRequest->validated();
        $this->scheduleService->deleteSchedule($request);
        return redirect()->route('schedule.index');
    }
}
