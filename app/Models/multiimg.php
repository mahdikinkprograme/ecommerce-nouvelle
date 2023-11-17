<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class multiimg extends Model
{
    protected $table = 'multiimage';
    protected $fillable = ['multiimg'];
    use HasFactory;
}
