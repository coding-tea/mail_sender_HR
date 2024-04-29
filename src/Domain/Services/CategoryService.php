<?php

namespace Domain\Services;

use App\Models\Category;
use Domain\DTOs\CategoryDto;

class CategoryService extends Service
{

    public function __construct()
    {
    }

    public static function query()
    {
        return Category::query();
    }

    public function store(CategoryDto $dtos)
    {
        $model = self::query()->create([
            "name" => $dtos->name,
            "type" => $dtos->type,
            "user_id" => $dtos->user_id,
        ]);

        return $model;
    }

    public function delete(Category $category)
    {
        $category->delete();
    }

    public function deleteArrayOfIds($arr)
    {
        self::query()->whereIn("id", $arr)->delete();
    }

    public function update(Category $category, CategoryDto $dtos)
    {
        $category->create([
            "name" => $dtos->name,
            "type" => $dtos->type,
        ]);
    }
}
