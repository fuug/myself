<?php

namespace App\Helpers;

use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

class Websocket implements MessageComponentInterface
{
    protected $clients;

    protected $chats;
    protected $users;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn)
    {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        $msg = json_decode($msg);
        if ($msg->action == 'conn') {
            if (!isset($this->chats[$msg->chat_id])) {
                $this->chats[$msg->chat_id][$from->resourceId] = $from;
            }
        } else {
            if (isset($msg->file)) {
                $message = Message::create(array(
                    "chat_id" => $msg->chat_id,
                    "user_id" => $msg->user_id,
                    "text" => $msg->message,
                    "file" => $msg->file
                ));
            } else {
                $message = Message::create(array(
                    "chat_id" => $msg->chat_id,
                    "user_id" => $msg->user_id,
                    "text" => $msg->message
                ));
            }

            foreach ($this->chats as $key => $chat) {
                if ($key == $msg->chat_id) {
                    foreach ($this->clients as $client) {
                        if ($from !== $client) {
                            $client->send($this->createMessage($message, false));
                            // $client->send('{"message": "' . $msg->message . '", "user_id": "' . $msg->user_id . '"}');
                        } else {
                            $client->send($this->createMessage($message, true));

                        }
                    }
                }
            }

        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        $conn->close();
    }

    public function createMessage($message, $is_writer): string
    {
        $html = '<div class="message message-';
        if ($is_writer) {
            $html .= 'writer';
        } else {
            $html .= 'reader';
        }
        $html .= '">';
        $html .= '<div class="message-thumbnail">';
        $html .= '<img src="' . url('storage/') . '/' . User::all()->where('id', $message->user_id)->first()->thumbnail . '" alt="User photo">';
        $html .= '</div>';
        $html .= '<div class="';
        if ($is_writer) {
            $html .= 'writer';
        } else {
            $html .= 'reader';
        }
        $html .= ' text"><div>';
        if (isset($message->file)) {
            $html .= '<img class="chat-thumb" src="' . url('storage/' . $message->file) . '">';
        }
        $html .= '<p>' . $message->text . '</p>';
        $html .= '</div>';
        $html .= '<span>' . User::all()->where('id', $message->user_id)->first()->convertTime($message->time()) . '</span>';
        $html .= '</div></div>';
        return $html;
    }
}
