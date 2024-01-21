<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $table = "subscriptions";
    protected $fillable = ['program_id', 'user_id'];
    protected $hidden = ['program_id', 'user_id'];
}
