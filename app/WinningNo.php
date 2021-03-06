<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;
use Illuminate\Support\Facades\DB;

class WinningNo extends Model
{
    //
    protected $table = 'winning_nos';

    protected $guarded = array('id');

    //バリデーションルール
    public static $rules = [
        'winning_type_id' => 'required | integer',
        'competition_id' => 'required | integer',
        'no' => 'integer',
        'maxno' => 'integer',
        'minno' => 'integer',
    ];

    /**
     * 乱数を生成
     * 重複が認められない場合は、重複の確認をしながら、乱数を生成する
     */
    public function createRamdomNo(bool $duplicate, int $maxno, int $competition_id): int
    {
        # code...
        //重複してもいいか？
        if ($duplicate) {
            # code...
            return mt_rand(1, intval($maxno));
        } else {
            # code...
            //対象の当選種類の番号を取得する
            $winningNos = DB::select(
                'SELECT * FROM competitions competition,winning_nos nos
                 WHERE competition.id = ?
                 AND competition.id = nos.competition_id',
                [$competition_id]
            );
            //dd($winningNos);

            //stdClassをarrayにキャスト
            $winningNos = json_decode(json_encode($winningNos), true);
            /**
             * 配列の構造
             * [
             *      [
             *          'no':数値
             *      ]
             * ]
             */
            //2次元配列の2次元目の値を取り出す
            $numbers = [];
            foreach ($winningNos as $key => $value) {
                # code...
                $numbers[] = $value['no'];
            }
            //重複がなくなるまで乱数を生成
            $no = 0;
            while (true) {
                # code...
                $no = mt_rand(1, intval($maxno));

                //生成した乱数が配列にすでにある場合、restartラベルに移行
                if (!in_array($no, $numbers, true)) {
                    # code...
                    break;
                }
            }



            return $no;
        }
    }
}
