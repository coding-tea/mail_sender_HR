<?php

namespace src\Domain\Services;

use App\Models\SentEmail;
use App\Models\User;
use src\Domain\DTOs\SentEmailDto;

class UserService extends Service
{

    public function __construct()
    {
    }

    public static function query()
    {
        return SentEmail::query();
    }

    public function store(SentEmailDto $dtos)
    {
        $model = self::query()->create([
            "email_id" => $dtos->email_id,
            "message_id" => $dtos->message_id,
        ]);

        return $model;
    }

    public function delete(SentEmail $sentEmail)
    {
        $sentEmail->delete();
    }

    public function deleteArrayOfIds($arr)
    {
        self::query()->whereIn("id", $arr)->delete();
    }

    // public function update(User $user, SentEmailDto $dtos)
    // {
    //     $user->create([
    //         "email_id" => $dtos->email_id,
    //         "message_id" => $dtos->message_id,
    //     ]);
    // }
}
