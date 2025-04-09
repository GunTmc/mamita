<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Activity extends Model
{
    use HasUuids;

    protected $guarded = [];
    protected $table = 'activities';

    const CATEGORY_TRAVEL = 'traveling';
    const CATEGORY_SPORT = 'olahraga';
    const CATEGORY_HEALTH = 'kesehatan';
    const CATEGORY_ENTERTAINMENT = 'hiburan';
    const CATEGORY_BODY_MOVEMENT = 'gerak tubuh';
    const CATEGORY_BEAUTY = 'kecantikan';

    const CATEGORY_AVAILABLE = [
        self::CATEGORY_TRAVEL,
        self::CATEGORY_SPORT,
        self::CATEGORY_HEALTH,
        self::CATEGORY_ENTERTAINMENT,
        self::CATEGORY_BODY_MOVEMENT,
        self::CATEGORY_BEAUTY
    ];

    public function newUniqueId(): string
    {
        return (string) Uuid::uuid4();
    }
}
