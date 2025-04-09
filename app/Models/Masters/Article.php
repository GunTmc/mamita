<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Article extends Model
{
    use HasUuids;

    protected $table = 'articles';

    protected $guarded = [];

    const TYPE_PREG = 'preg';
    const TYPE_CHILD = 'child';
    const TYPE_NEWS = 'news';

    public function newUniqueId(): string
    {
        return (string) Uuid::uuid4();
    }
}
