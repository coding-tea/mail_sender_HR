<?php

namespace src\Domain\DTOs;

use App\Models\User;
use Illuminate\Http\Request;

class UserDto extends DTO
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
            name: $request->name,
            email: $request->email,
            password: $request->password,
        );
    }

    public static function fromModel(User $user)
    {
        return new self(
            name: $user->name,
            email: $user->email,
            password: $user->password,
        );
    }
}
