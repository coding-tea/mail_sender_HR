<?php

namespace src\Domain\DTOs;

use App\Models\Email;
use App\Models\User;
use Illuminate\Http\Request;

class EmailDto extends DTO
{

    public function __construct(
        public readonly String|null $company,
        public readonly String|null $group,
        public readonly String|null $city,
        public readonly String|null $activity,
        public readonly String|null $person,
        public readonly String|null $function,
        public readonly String|null $tel,
        public readonly String|null $tax,
        public readonly String|null $fax,
        public readonly String|null $gsm,
        public readonly String $email,
        public readonly String|null $address,
        public readonly String $category_id,
        public readonly String $user_id,
    ) {
    }


    public static function fromRequest(Request $request)
    {
        return new self(
            company: $request->company,
            group: $request->group,
            city: $request->city,
            activity: $request->activity,
            person: $request->person,
            function: $request->function,
            tel: $request->tel,
            tax: $request->tax,
            fax: $request->fax,
            gsm: $request->gsm,
            email: $request->email,
            address: $request->address,
            category_id: $request->category_id,
            user_id: $request->user_id,
        );
    }

    public static function fromModel(Email $email)
    {
        return new self(
            company: $email->company,
            group: $email->group,
            city: $email->city,
            activity: $email->activity,
            person: $email->person,
            function: $email->function,
            tel: $email->tel,
            tax: $email->tax,
            fax: $email->fax,
            gsm: $email->gsm,
            email: $email->email,
            address: $email->address,
            category_id: $email->category_id,
            user_id: $email->user_id,
        );
    }
}
