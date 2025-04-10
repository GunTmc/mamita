<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class ScheduleChild extends Model
{
    use HasUuids;

    protected $table = 'schedules_children';

    protected $guarded = [];
    public function newUniqueId()
    {
        return Uuid::uuid4();
    }
}
