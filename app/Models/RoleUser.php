<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Schema\Blueprint;
use Orbit\Concerns\Orbital;

class RoleUser extends Pivot
{
    use Orbital;

    public $incrementing = true;

    public static function schema(Blueprint $table)
    {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('role_id');
    }
}
