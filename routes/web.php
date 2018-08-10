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

Route::get('/', function () {
    return view('welcome');
});

//后台路由群组
Route::group(['namespace'=>'Admin','prefix'=>'Admin'],function () {
    //后台首页
    Route::get('/','IndexController@index');
    //上传处理方法
    Route::post('/upload','IndexController@upload');
    //后台欢迎页面
    Route::get('welcome','IndexController@welcome');

//    //后台登录
//    Route::gat(['get','post'],'login','AdminController@login');
//    //后台退出
//    Route::get('logout','AdminController@logout');
    //学科管理
    Route::resource('subject','SubjectController');
    //专业管理
    Route::resource('profession','ProfessionController');
    //点播课程
    Route::resource('course','CourseController');
    //点播课时
    Route::resource('lesson','LessonController');
    //直播流管理
    Route::resource('stream','StreamController');
    //直播流管理
    Route::resource('live','LiveController');
});

//前台路由
Route::group(['namespace'=>'Home','prefix'=>'Home'],function() {
    //前台首页
    Route::get('/','IndexController@index');
    //课程的详情页
    Route::get('course/{course}','CourseController@detail');
    //
});