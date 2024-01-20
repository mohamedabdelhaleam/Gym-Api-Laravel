<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $table = "programs";
    protected $fillable = ['name', 'description', 'image', 'created_at', 'coach_id'];
    protected $hidden = ['coach_id', 'created_at'];
    public $timestamps = true;
}
