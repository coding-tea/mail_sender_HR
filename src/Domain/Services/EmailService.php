<?php

namespace Domain\Services;

use App\Models\Email;
use Domain\DTOs\EmailDto;

class EmailService extends Service
{

    public function __construct()
    {
    }

    public static function query()
    {
        return Email::query();
    }

    public function store(EmailDto $dtos)
    {
        $model = self::query()->create([
            "company" => $dtos->company,
            "group" => $dtos->group,
            "city" => $dtos->city,
            "activity" => $dtos->activity,
            "person" => $dtos->person,
            "function" => $dtos->function,
            "tel" => $dtos->tel,
            "tax" => $dtos->tax,
            "fax" => $dtos->fax,
            "gsm" => $dtos->gsm,
            "email" => $dtos->email,
            "address" => $dtos->address,
            "category_id" => $dtos->category_id,
            "user_id" => $dtos->user_id,
        ]);

        return $model;
    }

    public function delete(Email $email)
    {
        $email->delete();
    }

    public function deleteArrayOfIds($arr)
    {
        self::query()->whereIn("id", $arr)->delete();
    }

    public function update(Email $email, EmailDto $dtos)
    {
        $email->create([
            "company" => $dtos->company,
            "group" => $dtos->group,
            "city" => $dtos->city,
            "activity" => $dtos->activity,
            "person" => $dtos->person,
            "function" => $dtos->function,
            "tel" => $dtos->tel,
            "tax" => $dtos->tax,
            "fax" => $dtos->fax,
            "gsm" => $dtos->gsm,
            "email" => $dtos->email,
            "address" => $dtos->address,
        ]);
    }
}
