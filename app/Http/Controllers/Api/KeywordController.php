<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Keyword;

class KeywordController extends Controller
{
   /**
    *
    * キーワードコントローラー初期処理アクション
    *
    * @return aray
    */
    public function index(Request $request)
    {
        $initial = $request->input('initial'); // Requestからinitialパラメータを取り出す
        $keyword = Keyword::with('category') // KeywordモデルとCategoryモデルをjoin
            ->where('keywords.initial', '=', $initial) // keywordsテーブルのinitialで絞り込み
            ->orderby('keywords.keyword')
            ->get();

        return $keyword;
    }
}
