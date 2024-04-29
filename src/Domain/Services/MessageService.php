<?php

namespace Domain\Services;

use App\Models\Message;
use Domain\DTOs\MessageDto;
use DOMDocument;

class MessageService extends Service
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

        $dom = new DOMDocument();
        $dom->loadHTML($dtos->message, 9);
        $model = self::query()->create([
            "title" => $dtos->title,
            "message" => $dom->saveHTML(),
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
        $dom = new DOMDocument();
        $dom->loadHTML($dtos->message, 9);
        $message->create([
            "title" => $dtos->title,
            "message" => $dom->saveHTML(),
        ]);
    }
}
