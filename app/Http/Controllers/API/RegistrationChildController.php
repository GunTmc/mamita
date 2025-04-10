<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Registrations\StoreRegistrationChildRequest;
use App\Http\Requests\Registrations\StoreRegistrationPregnancyRequest;
use App\Http\Requests\Registrations\UpdateRegistrationChildRequest;
use App\Http\Requests\Registrations\UpdateRegistrationPregnancyRequest;
use App\Repositories\Registrations\RegistrationChildRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class RegistrationChildController extends Controller
{

    public function __construct(private RegistrationChildRepository $registrationChildRepository) {}

    public function store(StoreRegistrationChildRequest $storeRegistrationChildRequest)
    {
        $request = $storeRegistrationChildRequest->validated();
        $storeRegistrationChildRequest = $this->registrationChildRepository->createRegistrationChild(
            [
                'name' => $request['name'],
                'user_id' => $request['userId'],
                'date_of_birth' => Carbon::parse($request['dateOfBirth']),
                'height' => $request['height'],
                'weight' => $request['weight'],
                'gender' => $request['gender'],
                'status' => $request['status'] ?? null,
                'month_registration' => $request['monthRegistration'] ?? null
            ]
        );

        return response()->json([
            'status' => 'success',
            'message' => 'Registration Pregnancy successfully',
            'data' => [
                'id' => $storeRegistrationChildRequest->id,
                'name' => $storeRegistrationChildRequest->name,
                'dateOfBirth' => $storeRegistrationChildRequest->date_of_birth,
                'height' => $storeRegistrationChildRequest->height,
                'weight' => $storeRegistrationChildRequest->weight,
                'gender' => $storeRegistrationChildRequest->gender,
                'status' => $storeRegistrationChildRequest->status
            ]
        ]);
    }

    public function edit($userId, $id)
    {
        $child = $this->registrationChildRepository->getRegistrationChild($id);
        return view('registrations.child.edit', [
            'child' => $child,
            'userId' => $userId
        ]);
    }

    public function update(UpdateRegistrationChildRequest $updateRegistrationChildRequest, $userId, $id)
    {
        $request = $updateRegistrationChildRequest->validated();
        $this->registrationChildRepository->updateRegistrationChildById($request['id'], [
            'name' => $request['name'],
            'date_of_birth' => Carbon::parse($request['dateOfBirth']),
            'height' => $request['height'],
            'weight' => $request['weight'],
            'gender' => $request['gender'],
            'status' => $request['status'] ?? null,
            'month_registered' => $request['monthRegistered']
        ]);
        return redirect()->route('registrationChild.index', ['userId' => $userId]);
    }

    public function index($userId)
    {
        $children = $this->registrationChildRepository->getAllRegistrationChildrenByUserId($userId);
        return view('registrations.child.index', [
            'children' => $children,
            'userId' => $userId
        ]);
    }

    public function destroy($userId, $id)
    {
        $this->registrationChildRepository->deleteRegistrationChildById($id);
        return redirect()->route('registrationChild.index', ['userId' => $userId]);
    }
}
