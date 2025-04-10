<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Registrations\StoreRegistrationPregnancyRequest;
use App\Http\Requests\Registrations\UpdateRegistrationPregnancyRequest;
use App\Repositories\Registrations\RegistrationPregnancyRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class RegistrationPregnancyController extends Controller
{

    public function __construct(private RegistrationPregnancyRepository $registrationPregnancyRepository) {}

    public function store(StoreRegistrationPregnancyRequest $storeRegistrationPregnancyRequest)
    {
        $request = $storeRegistrationPregnancyRequest->validated();
        $storeRegistrationPregnancyRequest = $this->registrationPregnancyRepository->createRegistrationPregnancy(
            [
                'user_id' => $request['userId'],
                'period_pregnancy' => $request['periodPregnancy'],
                'last_period_menstruation' => isset($request['lastPeriodMenstruation']) ? Carbon::parse($request['lastPeriodMenstruation']) : null,
                'estimated_date_of_delivery' => isset($request['estimatedDateOfDelivery']) ? Carbon::parse($request['estimatedDateOfDelivery']) : null,
                'history' => $request['history'],
            ]
        );

        return response()->json([
            'status' => 'success',
            'message' => 'Registration Pregnancy successfully',
            'data' => [
                'id' => $storeRegistrationPregnancyRequest->id,
                'periodPregnancy' => $storeRegistrationPregnancyRequest->period_pregnancy,
                'lastPeriodMenstruation' => $storeRegistrationPregnancyRequest->last_period_menstruation,
                'estimatedDateOfDelivery' => $storeRegistrationPregnancyRequest->estimated_date_of_delivery,
                'history' => $storeRegistrationPregnancyRequest->history
            ]
        ]);
    }

    public function edit($userId, $id)
    {
        $pregnancy = $this->registrationPregnancyRepository->getRegistrationPregnancy($id);
        return view('registrations.pregnancy.edit', [
            'userId' => $userId,
            'pregnancy' => $pregnancy
        ]);
    }

    public function update(UpdateRegistrationPregnancyRequest $updateRegistrationPregnancyRequest, $userId, $id)
    {
        $request = $updateRegistrationPregnancyRequest->validated();
        $this->registrationPregnancyRepository->updateRegistrationPregnancyById($request['id'], [
            'period_pregnancy' => $request['periodPregnancy'],
            'last_period_menstruation' => isset($request['lastPeriodMenstruation']) ? Carbon::parse($request['lastPeriodMenstruation']) : null,
            'estimated_date_of_delivery' => isset($request['estimatedDateOfDelivery']) ? Carbon::parse($request['estimatedDateOfDelivery']) : null,
            'history' => $request['history'],
        ]);
        return redirect()->route('registrationPregnancy.index', ['userId' => $userId]);
    }

    public function index($userId)
    {
        $pregnancies = $this->registrationPregnancyRepository->getAllRegistrationPregnancyByUserId($userId);
        return view('registrations.pregnancy.index', [
            'pregnancies' => $pregnancies,
            'userId' => $userId
        ]);
    }

    public function destroy($userId, $id)
    {
        $this->registrationPregnancyRepository->deleteRegistrationPregnancyById($id);
        return redirect()->route('registrationPregnancy.index', ['userId' => $userId]);
    }
}
