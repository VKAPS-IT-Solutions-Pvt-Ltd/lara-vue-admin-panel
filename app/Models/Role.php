<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public const ROLE_ADMIN = 1;
    public const ROLE_STAFF = 2;
    public const ROLE_CUSTOMER = 3;

    protected $fillable = [
      'role_name',
    ];

    protected $dates = [
        'deleted_at',
    ];
}
