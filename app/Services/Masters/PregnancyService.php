<?php

namespace App\Services\Masters;

use App\Repositories\Masters\Pregnancies\PregnancyRepository;
use Illuminate\Support\Facades\Storage;

class PregnancyService
{
    public function __construct(private PregnancyRepository $pregnancyRepository) {}

    public function DataPregnancy($data)
    {
        return $this->pregnancyRepository->getAllPregnancy($data);
    }

    public function storePregnancy($data)
    {
        // store image 
        $usg = Storage::put('usg/' . $data['usg']->hashName() . '-' . now()->format('YmdHis') . '.' . $data['usg']->extension(), $data['usg']);
        $fetus = Storage::put('fetus/' . $data['fetus']->hashName() . '-' . now()->format('YmdHis') . '.' . $data['fetus']->extension(), $data['fetus']);

        return $this->pregnancyRepository->createPregnancy([
            'gestational_age' => $data['gestationalAge'],
            'note' => $data['note'],
            'weight' => $data['weight'],
            'fetus' => $fetus,
            'usg' => $usg,
        ]);
    }

    public function updatePregnancy($data)
    {
        $pregnancy = $this->pregnancyRepository->getPregnancyById($data['id']);
        $usg = isset($data['usg']) ? Storage::put('usg/' . $data['usg']->hashName() . '-' . now()->format('YmdHis') . '.' . $data['usg']->extension(), $data['usg']) : $pregnancy->usg;
        $fetus = isset($data['fetus']) ? Storage::put('fetus/' . $data['fetus']->hashName() . '-' . now()->format('YmdHis') . '.' . $data['fetus']->extension(), $data['fetus']) : $pregnancy->fetus;

        return $this->pregnancyRepository->updatePregnancyById([
            'gestational_age' => $data['gestationalAge'],
            'note' => $data['note'],
            'weight' => $data['weight'],
            'fetus' => $fetus,
            'usg' => $usg,
        ], $data['id']);
    }

    public function deletePregnancy($data)
    {
        return $this->pregnancyRepository->deletePregnancyById($data['id']);
    }

    public function getPregnancy($data)
    {
        return $this->pregnancyRepository->getPregnancyById($data['id']);
    }
}
