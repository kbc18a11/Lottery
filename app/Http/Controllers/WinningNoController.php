<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\WinningNo;
use App\WinningType;

class WinningNoController extends Controller
{
    //
    /**
     *
     */
    public function index(Request $request)
    {
        # code...
    }

    /**
     * 当選番号の管理画面に遷移する
     */
    public function management(Request $request)
    {
        # code...
        $id = $request->id;

        $winningtypes = DB::table('winning_types')
            ->where('competition_id', $id)
            ->orderBy('maxNumberOfPeople')
            ->orderBy('name')->get();

        //当選番号の番号本体と当選種類名の一覧を取り出す
        $winning_noObjs = DB::select('SELECT nos.no , types.name FROM winning_nos nos, winning_types types
         WHERE nos.competition_id = ?
         AND types.competition_id = ?
         AND nos.winning_type_id = types.id', [$id, $id]);
        //dd(winning_noObjs);

        $param = [
            'competition_id' => $id,
            'winningtypes' => $winningtypes,
            'winning_noObjs' => $winning_noObjs
        ];

        return view('winningNomanagement', $param);
    }

    /**
     * 個別当選
     */
    public function createSignle(Request $request)
    {
        # code...
        $this->validate($request, WinningNo::$rules);

        $param = [
            'winning_type_id' => $request->winning_type_id,
            'competition_id' => $request->competition_id,
            'no' => $request->no
        ];
        //dd($param);

        WinningNo::create($param);

        return redirect('/winningNoManager/' . $request->competition_id);
    }
}
