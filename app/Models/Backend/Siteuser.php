<?php

namespace App\Models\Backend;

use App\Models\Backend\Role;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siteuser extends User
{
    use HasFactory;
    protected $guarded = [];
    public function role(){
        return $this->belongsTo(Role::class);
    }
}
