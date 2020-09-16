<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories'; // テーブル名を指定

   /**
    *
    * カテゴリーセレクトボックス取得メソッド
    * 管理画面用にarray([id]=> [name])の配列を返却する
    * @return array
    */
    public function findCategorySelectBoxInAdmin(): array
    {
        // Categoryモデルからidとnameを取得
        $categories = Category::select('id', 'name')->get();

        $categoryArray = [];

        foreach ($categories as $category) {
            $categoryArray[$category->id] = $category->name;
        }
        return $categoryArray;
    }
}
