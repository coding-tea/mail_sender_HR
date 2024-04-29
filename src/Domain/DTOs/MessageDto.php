<?php

namespace Domain\DTOs;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageDto extends DTO
{

    public function __construct(
        public readonly String $title,
        public readonly String $message,
        public readonly String $user_id,
    ) {
    }


    public static function fromRequest(Request $request)
    {
        return new self(
            title: $request->title,
            message: $request->message,
            user_id: $request->user_id,
        );
    }

    public static function fromModel(Message $message)
    {
        return new self(
            title: $message->title,
            message: $message->message,
            user_id: $message->user_id,
        );
    }
}
