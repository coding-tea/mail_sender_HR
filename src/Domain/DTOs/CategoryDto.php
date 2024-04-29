<?php

namespace Domain\DTOs;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryDto extends DTO
{

    public function __construct(
        public readonly String $name,
        public readonly String $type,
        public readonly String $user_id,
    ) {
    }


    public static function fromRequest(Request $request)
    {
        return new self(
            name: $request->name,
            type: $request->type,
            user_id: $request->user_id,
        );
    }

    public static function fromModel(Category $category)
    {
        return new self(
            name: $category->name,
            type: $category->type,
            user_id: $category->user_id,
        );
    }
}
