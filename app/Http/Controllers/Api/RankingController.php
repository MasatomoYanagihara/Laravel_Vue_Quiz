<?php

namespace App\Http\Controllers\Api;

use DB;
use App\Ranking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    /**
     *
     *
     * @return
     */
    public function index()
    {
        //RankingモデルとUserモデルをJOINして取得
        $weekRanking = Ranking::with('user')

        // percentage_correct_answerの最大値を取得
        ->select(DB::raw('MAX(rankings.percentage_correct_answer) as percentage_correct_answer, rankings.user_id, rankings.created_at'))

        // 今週の始めから終わりまでの期間で絞り込み
        ->whereBetween('rankings.created_at', [now()->startOfWeek()->format('Y-m-d'), now()->endOfWeek()->format('Y-m-d')])

        // 5件だけ
        ->limit(5)

        // percentage_correct_answerを降順にする
        ->orderby('percentage_correct_answer', 'desc')

        // グループ化して、ユーザー名の重複をなくす
        ->groupBy('rankings.user_id')

        // 取得
        ->get();

        $weekRankingData = [
            // pluck()は指定したキーの全コレクション値を取得する。
            // percentage_correct_answerの全コレクション値を取得し、配列に変換
            'percentage_correct_answer' => $weekRanking->pluck('percentage_correct_answer')->all(),

            // user.nameの全コレクション値を取得し、配列に変換
            'name' => $weekRanking->pluck('user.name')->all()
        ];

        $monthRanking = Ranking::with('user')
        ->select(DB::raw('MAX(rankings.percentage_correct_answer) as percentage_correct_answer, rankings.user_id, rankings.created_at'))
        ->whereBetween('rankings.created_at', [now()->startOfMonth()->format('Y-m-d'), now()->endOfMonth()->format('Y-m-d')])
        ->limit(5)
        ->orderby('percentage_correct_answer', 'desc')
        ->groupBy('rankings.user_id')
        ->get();

        $monthRankingData = [
          'percentage_correct_answer' => $monthRanking->pluck('percentage_correct_answer')->all(),
          'name' => $monthRanking->pluck('user.name')->all()
        ];

        $totalRanking = Ranking::with('user')
        ->select(DB::raw('MAX(rankings.percentage_correct_answer) as percentage_correct_answer, rankings.user_id, rankings.created_at'))
        ->limit(5)
        ->orderby('percentage_correct_answer', 'desc')
        ->groupBy('rankings.user_id')
        ->get();

        $totalRankingData = [
            'percentage_correct_answer' => $totalRanking->pluck('percentage_correct_answer')->all(),
            'name' => $totalRanking->pluck('user.name')->all()
        ];

        return [
            'weekRankingData' => $weekRankingData,
            'monthRankingData' => $monthRankingData,
            'totalRankingData' => $totalRankingData
        ];
    }
}
