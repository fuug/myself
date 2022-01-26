<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformerDescription extends Model
{
    use HasFactory;

    protected $table = 'performerDescription';
    protected $guarded = false;
}
