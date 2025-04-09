<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\Masters\PregnancyService;
use Illuminate\Support\Facades\Storage;

class PregnancyController extends Controller
{
    public function __construct(private PregnancyService $pregnancyService) {}

    public function index()
    {
        return response()->json(
            [
                'status' => true,
                'message' => 'success get pregnancy',
                'data' => $this->pregnancyService->DataPregnancy([])->get()->map(function ($pregnancy) {
                    return [
                        'id' => $pregnancy->id,
                        'name' => $pregnancy->name,
                        'note' => $pregnancy->note,
                        'usg' => $pregnancy->usg ? Storage::url($pregnancy->usg) : null,
                        'fetus' => $pregnancy->fetus ? Storage::url($pregnancy->fetus) : null,
                        'gestationalAge' => $pregnancy->gestational_age,
                        'createdAt' => $pregnancy->created_at->format('Y-m-d H:i:s'),
                        'updatedAt' => $pregnancy->updated_at->format('Y-m-d H:i:s'),
                    ];
                })->toArray(),
            ]
        );
    }
}
