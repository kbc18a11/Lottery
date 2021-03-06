<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//ホーム画面
Route::get('/', 'CompetitionsController@index');

//ログアウト
Route::get('/logout', 'Auth\LoginController@logout');

Auth::routes();

//テスト用
Route::get('/test', 'TestController@index');


Route::group(['middleware' => ['auth']], function () {
    //大会主催の登録関係
    Route::get('/create', 'CompetitionsController@create');
    Route::post('/create', 'CompetitionsController@insert');
    //ホストの主催一覧
    Route::get('/my', 'CompetitionsController@my');

    //当選種類の管理画面
    Route::get('/winningTypeManager/{id}', 'WinningTypesController@index');
    //当選種類を追加
    Route::post('/createWinningType', 'WinningTypesController@create');
    //当選種類の編集
    Route::get('/updateWinningType/{id}', 'WinningTypesController@update');
    Route::post('/updateWinningType/{id}', 'WinningTypesController@edit');
    //当選種類の削除
    Route::post('/deleteWinningType', 'WinningTypesController@destroy');

    //当選番号の管理
    Route::get('/winningNoManager/{id}', 'WinningNoController@management');
    //個別に番号を決めて当選させる
    Route::post('/createWinningNoSingle', 'WinningNoController@createSignle');
    //当選種類別にランダムに当選させる
    Route::post('/createWinningNoRandom', 'WinningNoController@createRandom');
    //当選種類別に範囲を決めて当選させる
    Route::post('/createBetweenRandom', 'WinningNoController@createBetweenRandom');
    //当選番号の修正(更新処理)
    Route::get('/updateNo/{id}', 'WinningNoController@updateNo');
    Route::post('/updateNo', 'WinningNoController@editNo');
    //当選番号の削除
    Route::post('/deleteNo', 'WinningNoController@delete');

});
//大会の詳細
Route::get('/details/{id}', 'CompetitionsController@details');
//ヘッダーの大会の検索バー
Route::post('/serch', 'CompetitionsController@serch');

//当選番号の一覧表示
Route::get('/winningNo/{id}', 'WinningNoController@index');

//当選番号確認
Route::get('/singleNoConfirmation/{id}', 'WinningNoController@singleNoselect');
Route::post('/singleNoConfirmation', 'WinningNoController@singleNoConfirmation');
