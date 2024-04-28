<?php

namespace src\Domain\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use src\Domain\DTOs\UserDto;

class UserService extends Service
{

    public function __construct()
    {
    }

    public static function query()
    {
        return User::query();
    }

    public function store(UserDto $dtos)
    {
        $model = self::query()->create([
            "name" => $dtos->name,
            "email" => $dtos->email,
            "password" => Hash::make($dtos->password),
        ]);

        return $model;
    }

    public function delete(User $user)
    {
        $user->delete();
    }

    public function deleteArrayOfIds($arr)
    {
        self::query()->whereIn("id", $arr)->delete();
    }

    public function update(User $user, UserDto $dtos)
    {
        $user->create([
            "name" => $dtos->name,
            "email" => $dtos->email,
            "password" => Hash::make($dtos->password),
        ]);
    }
}
