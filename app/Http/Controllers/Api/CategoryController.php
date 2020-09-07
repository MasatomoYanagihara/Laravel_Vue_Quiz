<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Categoryモデルからidとnameカラムの全てのデータを取得する
        $category = Category::select('id', 'name')->get();
        
        // 取得したデータをそのまま返却する
        return $category;
    }
}
