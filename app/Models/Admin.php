<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
class Admin extends Authenticatable
{
    use HasFactory, Notifiable , HasRoles;

    protected $guard = ['admin'];
    protected $fillable = [
        'name',
        'username',
        'password',
        'phone_number',
        'status',
        'super_admin',
        'email',
        'store_id',
    ];

    public function Store()
    {
        return $this->belongsTo(Store::class);
    }
}
