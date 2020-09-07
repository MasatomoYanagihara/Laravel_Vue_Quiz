<?php

namespace App\Http\Controllers\Api;

use App\Quiz;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->input('categories'); // categoriesをリクエストから取得
        if ($category) {
            $category = explode(',', $category); // stringで受け取るのでarrayに変換
        } else {
            return []; // categoriesが何もなければ空の配列を返却
        }

        $quiz = Quiz::with(['answer', 'category']) // withを用いて、関連するテーブルも取得可能
            ->wherein('quizzes.categories_id', $category)
            ->inRandomOrder()
            ->limit(10)
            ->get();

        return $quiz;
    }
}
