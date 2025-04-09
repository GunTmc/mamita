<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Food extends Model
{
    use HasUuids;

    protected $guarded = [];
    protected $table = 'food';

    const CATEGORY_SEED = 'biji - bijian';
    const CATEGORY_VEGETABLE = 'sayuran';
    const CATEGORY_PEANUT = 'kacang';
    const CATEGORY_MILK = 'olahan susu';
    const CATEGORY_FRUIT = 'buah';
    const CATEGORY_SNACK = 'snack';
    const CATEGORY_SEE_FOOD = 'see food';
    const CATeGORY_DRINK = 'minuman';
    const CATEGORY_MEAT = 'daging';

    const CATEGORY_AVAILABLE = [
        self::CATEGORY_SEED,
        self::CATEGORY_VEGETABLE,
        self::CATEGORY_PEANUT,
        self::CATEGORY_MILK,
        self::CATEGORY_FRUIT,
        self::CATEGORY_SNACK,
        self::CATEGORY_SEE_FOOD,
        self::CATeGORY_DRINK,
        self::CATEGORY_MEAT
    ];

    public function newUniqueId(): string
    {
        return (string) Uuid::uuid4();
    }
}
