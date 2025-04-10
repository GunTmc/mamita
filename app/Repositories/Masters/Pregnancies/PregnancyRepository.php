<?php

namespace App\Repositories\Masters\Pregnancies;

use App\Models\Masters\Pregnancy;

class PregnancyRepository
{
    public function getAllPregnancy($params)
    {
        return Pregnancy::orderByRaw('CAST(gestational_age AS DECIMAL(10,2)) ASC')
            ->with(['articles']);
    }

    public function createPregnancy($data)
    {
        return Pregnancy::create($data);
    }

    public function updatePregnancyById($data, $id)
    {
        return Pregnancy::where('id', $id)->update($data);
    }

    public function deletePregnancyById($id)
    {
        return Pregnancy::where('id', $id)->delete();
    }

    public function getPregnancyById($id)
    {
        return Pregnancy::where('id', $id)->first();
    }
}
