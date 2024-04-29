<?php

namespace Domain\DTOs;

use App\Models\SentEmail;
use Illuminate\Http\Request;

class SentEmailDto extends DTO
{

    public function __construct(
        public readonly String $email_id,
        public readonly String $message_id,
    ) {
    }


    public static function fromRequest(Request $request)
    {
        return new self(
            email_id: $request->email_id,
            message_id: $request->message_id,
        );
    }

    public static function fromModel(SentEmail $sentEmail)
    {
        return new self(
            email_id: $sentEmail->email_id,
            message_id: $sentEmail->message_id,
        );
    }
}
