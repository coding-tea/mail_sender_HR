<?php

namespace src\Domain\Services;

use App\Models\Message;
use src\Domain\DTOs\MessageDto;

class UserService extends Service
{

    public function __construct()
    {
    }

    public static function query()
    {
        return Message::query();
    }

    public function store(MessageDto $dtos)
    {
        $model = self::query()->create([
            "title" => $dtos->title,
            "message" => $dtos->message,
            "user_id" => $dtos->user_id,
        ]);

        return $model;
    }

    public function delete(Message $message)
    {
        $message->delete();
    }

    public function deleteArrayOfIds($arr)
    {
        self::query()->whereIn("id", $arr)->delete();
    }

    public function update(Message $message, MessageDto $dtos)
    {
        $message->create([
            "title" => $dtos->title,
            "message" => $dtos->message,
        ]);
    }
}
