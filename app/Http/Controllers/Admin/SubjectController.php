<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subject;
use Validator;

class SubjectController extends Controller
{
    /**
     * 学科展示.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("/admin/subject/index");
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.subject.add');
    }

    /**
     * 添加数据
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Subject $subject)
    {
         // 接收数据 
        $data = $request->only(["logo","subject_name","sort"]);
        // 校验数据
        $rules = [
            "subject_name" => "required|unique:subject",
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
        $subject = $subject->create($data);
        // $subject = Subject::create($data)

        // 返回结果
        if($subject){
            return ["message"=>"添加学科成功！", "status"=>true];
        }else{
            return ["message"=>"添加学科失败！", "status"=>false];
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
     * 显示编辑学科的表单
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        $data["subjectInfo"] = $subject;
        return view("Admin.subject.edit",$data);
    }

    /**
     * 接收编辑学科的数据
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        // 接收数据 
        $data = $request->only(["logo","subject_name","sort"]);
        // 校验数据
        $rules = [
            // unique: 表名,字段名,忽略当前id
            "subject_name" => "required|unique:subject,subject_name," . $subject->id,
            "sort"         => "numeric",
        ];


        // 获取校验结果对象
        $validator = Validator::make($data, $rules);
        
        // 判断校验是否失败了
        if( $validator->fails() ){
            return ["message"=>$validator->messages()->all(), "status"=>false];
        }

        // 保存数据
        $subject = $subject->update($data);

        // 返回结果
        if($subject){
            return ["message"=>"保存学科成功！", "status"=>true];
        }else{
            return ["message"=>"保存学科失败！", "status"=>false];
        }
        
    }

    /**
     * 删除学科
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subjectModel = Subject::all();

        $subject = $subjectModel->find($id);
        // $res = $subject->forceDelete(); // 永久删除Subject $subject
        $res = $subject->delete();   // 软删除[在开启了软删除]
        if( $res ){
            return ["message"=>"删除成功！","status"=>true];
        }else{
            return ["message"=>"删除失败！","status"=>false];
        }
    }

    /**
     * ajax请求学科列表
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax_list(Request $request, Subject $subject)
    {
        // $sql = 'select id from subject where 1';
        // dd($subject->select($sql));
        // 判断是否是ajax请求
        if( !$request->ajax() ){
            return ["message"=>"非法请求","status"=>False];
        }
        // 获取学科信息
        $data  = $subject->get();    // 数据
        $cnt   = $subject->count();  // 数据的总数量

        // 返回学科信息[格式必须按照dataTable的要求进行返回]
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
