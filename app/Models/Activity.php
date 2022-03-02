<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'activities';
    protected $guarded = false;

    public function users(){
        return $this->belongsToMany(User::class, 'activity_users', 'activity_id', 'user_id');
    }
}
