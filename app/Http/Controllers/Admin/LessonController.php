<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Course;
use Validator;


class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("admin.lesson.index");
    }

    /**
     * 课时管理添加模板
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        $data['courseList'] = $course->get();
        return view('admin.lesson.add',$data);
    }

    /**
     * 添加数据
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Lesson $lesson)
    {
         // 接收数据 
        $data = $request->all();
        // 校验数据
        $rules = [
            "lesson_name" => "required|unique:lesson",
            "sort"         => "numeric",
        ];

        // 获取校验结果对象
        $validator = Validator::make($data, $rules);
        
        // 判断校验是否失败了
        if( $validator->fails() ){
            // 在前端提交数据以后，我们后端应该在校验完成以后，直接把错误信息通过
            // $validator->messages()->all()
            return ["message"=>$validator->messages()->all(), "status"=>false];
        }

        // 保存数据
        $lesson = $lesson->create($data);
        // $lesson = course::create($data)

        // 返回结果
        if($lesson){
            return ["message"=>"添加课时管理成功！", "status"=>true];
        }else{
            return ["message"=>"添加课时管理失败！", "status"=>false];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * 显示编辑课时管理的表单
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        $data["lessonInfo"] = $lesson;
        return view("admin.lesson.edit",$data);
    }

    /**
     * 接收编辑课时管理的数据
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        // 接收数据 
        $data = $request->only(["logo","lesson_name","sort"]);
        // 校验数据
        $rules = [
            // unique: 表名,字段名,忽略当前id
            "lesson_name" => "required|unique:lesson,lesson_name," . $lesson->id,
            "sort"         => "numeric",
        ];


        // 获取校验结果对象
        $validator = Validator::make($data, $rules);
        
        // 判断校验是否失败了
        if( $validator->fails() ){
            return ["message"=>$validator->messages()->all(), "status"=>false];
        }

        // 保存数据
        $lesson = $lesson->update($data);

        // 返回结果
        if($lesson){
            return ["message"=>"保存课时管理成功！", "status"=>true];
        }else{
            return ["message"=>"保存课时管理失败！", "status"=>false];
        }
        
    }

    /**
     * 删除课时管理
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lessonModel = course::all();

        $lesson = $lessonModel->find($id);
        // $res = $lesson->forceDelete(); // 永久删除Lesson $lesson
        $res = $lesson->delete();   // 软删除[在开启了软删除]
        if( $res ){
            return ["message"=>"删除成功！","status"=>true];
        }else{
            return ["message"=>"删除失败！","status"=>false];
        }
    }

    /**
     * ajax请求课时管理列表
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax_list(Request $request, Lesson $lesson)
    {
        // $sql = 'select id from course where 1';
        // dd($lesson->select($sql));
        // 判断是否是ajax请求
        if( !$request->ajax() ){
            return ["message"=>"非法请求","status"=>False];
        }
        // 获取课时管理信息
        $data  = $lesson->with("course")->get();    // 数据
        $cnt   = $lesson->count();  // 数据的总数量

        // 返回课时管理信息[格式必须按照dataTable的要求进行返回]
        $info = [
            // 前端dataTables插件要求返回的字段，表示当前前端请求后端次数
            'draw'=>$request->get('draw'),
            'recordsTotal'=>$cnt,   // 数据的总数，方便前端进行分页
            'recordsFiltered'=>$cnt,
            'data'=>$data,  // 列表展示的数据
        ];
        return $info;
    }
}
