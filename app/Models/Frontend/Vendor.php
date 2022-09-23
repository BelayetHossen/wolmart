<?php

namespace App\Models\Frontend;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vendor extends User
{
    use HasFactory;
    protected $guarded = [];
}
