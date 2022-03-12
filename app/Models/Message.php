<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'user_id',
        'chat_id',
        'file',
    ];

    protected $table = 'messages';
    protected $guarded = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function time()
    {
        return $this->created_at->format('h:i');
    }
}
