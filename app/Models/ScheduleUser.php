<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class ScheduleUser extends Model
{
    use HasUuids;

    protected $table = 'schedules_users';

    protected $guarded = [];

    public function newUniqueId()
    {
        return Uuid::uuid4();
    }
}
