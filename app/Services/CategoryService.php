<?php


namespace App\Services;


use App\Models\Category;

class CategoryService
{
    // 递归查询
    // $parentId参数代表要获取子类目的父类目ID，null代表获取所有根类目
    // $allCategories 参数代表数据库中的所有类目，如果是null,则需要从数据库查询
    public function getCategoryTree($parentId = null, $allCategories = null) {
        if (is_null($allCategories)) {
            $allCategories = Category::all();
        }
        return $allCategories
            ->where('parent_id', $parentId)
            ->map(function (Category $category) use ($allCategories) {
                $data = ['id' => $category->id, 'name' => $category->name];
                if (!$category->is_directory) {
                    return $data;
                }
                $data['children'] = $this->getCategoryTree($category->id,$allCategories);
                return $data;
            });
    }
}