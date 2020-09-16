<?php

namespace App;

use App\Answer;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quizzes'; // テーブル名を指定

    public function answer()
    {
        return $this->hasOne('App\Answer', 'id', 'answers_id');
    }

    public function category()
    {
        return $this->hasOne('App\Category', 'id', 'categories_id');
    }

    public static function boot()
    {
        // boot()は登録や削除の際に実行されるメソッド
        parent::boot();

        // リレーションで紐づいたAnswerを削除
        static::deleting(function ($answer_model) {
            $answer_model->answer()->delete();
        });
    }
}
