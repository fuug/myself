<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $table = 'chats';
    protected $guarded = false;

    public function messages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Message::class, 'chat_id');
    }

    public function messagesReverse(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Message::class, 'chat_id')->orderByDesc('created_at');
    }

    public function getLastMessage(): array
    {
        $message = $this->messages()->orderBy('created_at', 'desc')->first();
        if ($message != null) {
            return ["text" => $message->text, "created_at" => $message->created_at->format('h:i') ];
        }
        return ["text" => '', "created_at" => ''];
    }
}
