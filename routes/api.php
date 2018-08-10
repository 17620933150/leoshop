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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace'=>'Admin','prefix'=>'Admin'],function () {
    // ajax请求学科列表
    Route::get("subject/ajax_list","SubjectController@ajax_list");
    // ajax请求专业列表
    Route::get("profession/ajax_list","ProfessionController@ajax_list");
    // ajax请求点播课程列表
    Route::get("course/ajax_list","CourseController@ajax_list");
    // ajax请求点播课时列表
    Route::get("lesson/ajax_list","LessonController@ajax_list");
    // ajax请求直播流列表
    Route::get("stream/ajax_list","StreamController@ajax_list");
    // ajax请求直播课程列表
    Route::get("live/ajax_list","LiveController@ajax_list");
    // ajax请求邮件接口
    Route::get("live/email","LiveController@email");
    // ajax请求信息接口
    Route::get("live/sms","LiveController@sms");
});

//前台接口的路由群组
Route::group(['namespace'=>'Home','prefix'=>'Home'],function() {
    //前台学科列表
    Route::get("index/subject","IndexController@subject");
    //前台专业列表
    Route::get("index/profession","IndexController@profession");
    //前台课程列表
    Route::get("index/course","IndexController@course");
});