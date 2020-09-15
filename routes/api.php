<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// API認証OKならアクセス可
Route::middleware('auth:api')->get('/mypage', 'Api\MypageController@index');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['api']], function () {
    // /api/information
    // お知らせデータ
    Route::get('information', 'Api\InformationController@index');
    
    // /api/category
    // カテゴリーデータ
    Route::get('category', 'Api\CategoryController@index');
    
    // /api/quiz
    Route::get('quiz', 'Api\QuizController@index');
    
    // /api/ranking
    // 点数ランキングデータ
    Route::get('ranking', 'Api\RankingController@index');

    // /api/keyword
    // キーワードデータ
    Route::get('keyword', 'Api\KeywordController@index');
});
