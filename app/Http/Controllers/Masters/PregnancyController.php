<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use App\Http\Requests\Masters\DataPregnancyRequest;
use App\Http\Requests\Masters\EditPregnancyRequest;
use App\Http\Requests\Masters\UpdatePregnancyRequest;
use App\Services\Masters\PregnancyService;
use Illuminate\Http\Request;

class PregnancyController extends Controller
{
    public function __construct(private PregnancyService $pregnancyService) {}

    public function index()
    {
        return view('masters.indexPregnancies', [
            'pregnancies' => $this->pregnancyService->DataPregnancy([])->get(),
            'title' => 'Perkembangan Kehamilan'
        ]);
    }

    public function edit(EditPregnancyRequest $editPregnancyRequest)
    {
        $request = $editPregnancyRequest->validated();
        return view('masters.editPregnancy', [
            'pregnancy' => $this->pregnancyService->getPregnancy($request)
        ]);
    }

    public function update(UpdatePregnancyRequest $updatePregnancyRequest)
    {
        $request = $updatePregnancyRequest->validated();
        $this->pregnancyService->updatePregnancy($request);
        return redirect()->route('pregnancy.index');
    }
}
