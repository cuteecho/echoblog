<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return Redirect:: Route('user.index');
});
Route::group(['prefix'=>'user'],function(){
    $sController='UserController@';
    Route::any('/',['as'=>'user','uses'=>$sController.'index']);
    Route::any('/index',['as'=>'user.index','uses'=>$sController.'index']);
    Route::any('/edit/{id?}',['as'=>'user.edit','uses'=>$sController.'edit']);
    Route::any('/add',['as'=>'user.add','uses'=>$sController.'add']);
    Route::get('/delete',['as'=>'user.delete','uses'=>$sController.'delete']);
    Route::get('/{type}/setLocale',['as'=>'setLocale','uses'=>$sController.'setLocale']);

});
Route::group(['prefix'=>'article'],function(){
    $sController="ArticleController@";
    Route::any('/index/{id?}',['as'=>'article.index','uses'=>$sController.'index']);
});
Route::get('/test',function(){

    return View::make('test/index');
});
Route::group(['prefix'=>'login'],function(){
    $sController="LoginController@";
    Route::any('/',function(){
        echo 34;exit;
    });
    Route::any('/out',['as'=>'login.out','uses'=>$sController.'logout']);
    Route::any('/login',['as'=>'login.login','uses'=>$sController.'login']);
});
Route::group(['prefix'=>'role'],function(){
    $sController="RoleController@";
    Route::any('/',function(){
        echo 34;exit;
    });
    Route::any('/edit/{id}',['as'=>'role.edit','uses'=>$sController.'edit']);

});