<?php

namespace src\Domain\DTOs;

use App\Models\User;
use Illuminate\Http\Request;

class UserDto extends DTO
{

    public function __construct(
        public readonly String $name,
        public readonly String $email,
        public readonly String $password,
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
