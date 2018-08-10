<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Profession;
use Validator;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("admin/course/index");
    }

    /**
     * 点播课程添加模板
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Profession $profession)
    {
        $data['professionList'] = $profession->get();
        return view('admin.course.add',$data);
    }

    /**
     * 添加数据
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Course $course)
    {
         // 接收数据 
        $data = $request->all();
        // 校验数据
        $rules = [
            "course_name" => "required|unique:course",
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
        $course = $course->create($data);
        // $course = profession::create($data)

        // 返回结果
        if($course){
            return ["message"=>"添加点播课程成功！", "status"=>true];
        }else{
            return ["message"=>"添加点播课程失败！", "status"=>false];
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
     * 显示编辑点播课程的表单
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $data["courseInfo"] = $course;
        return view("admin.course.edit",$data);
    }

    /**
     * 接收编辑点播课程的数据
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        // 接收数据 
        $data = $request->only(["logo","course_name","sort"]);
        // 校验数据
        $rules = [
            // unique: 表名,字段名,忽略当前id
            "course_name" => "required|unique:course,course_name," . $course->id,
            "sort"         => "numeric",
        ];


        // 获取校验结果对象
        $validator = Validator::make($data, $rules);
        
        // 判断校验是否失败了
        if( $validator->fails() ){
            return ["message"=>$validator->messages()->all(), "status"=>false];
        }

        // 保存数据
        $course = $course->update($data);

        // 返回结果
        if($course){
            return ["message"=>"保存点播课程成功！", "status"=>true];
        }else{
            return ["message"=>"保存点播课程失败！", "status"=>false];
        }
        
    }

    /**
     * 删除点播课程
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $courseModel = profession::all();

        $course = $courseModel->find($id);
        // $res = $course->forceDelete(); // 永久删除Course $course
        $res = $course->delete();   // 软删除[在开启了软删除]
        if( $res ){
            return ["message"=>"删除成功！","status"=>true];
        }else{
            return ["message"=>"删除失败！","status"=>false];
        }
    }

    /**
     * ajax请求点播课程列表
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax_list(Request $request, Course $course)
    {
        // $sql = 'select id from profession where 1';
        // dd($course->select($sql));
        // 判断是否是ajax请求
        if( !$request->ajax() ){
            return ["message"=>"非法请求","status"=>False];
        }
        // 获取点播课程信息
        $data  = $course->with("profession")->get();    // 数据
        $cnt   = $course->count();  // 数据的总数量

        // 返回点播课程信息[格式必须按照dataTable的要求进行返回]
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
