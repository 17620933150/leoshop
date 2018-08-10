<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Profession;
use App\Models\Subject;
use Validator;


class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("admin/profession/index");
    }

    /**
     * 专业添加模板
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Subject $subject)
    {
        $data['subjectList'] = $subject->get();
        return view('admin.profession.add',$data);
    }

    /**
     * 添加数据
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Profession $profession)
    {
         // 接收数据 
        $data = $request->all();
        // 校验数据
        $rules = [
            "profession_name" => "required|unique:profession",
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
        $profession = $profession->create($data);
        // $profession = Subject::create($data)

        // 返回结果
        if($profession){
            return ["message"=>"添加专业成功！", "status"=>true];
        }else{
            return ["message"=>"添加专业失败！", "status"=>false];
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
     * 显示编辑专业的表单
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Profession $profession)
    {
        $data["professionInfo"] = $profession;
        return view("admin.profession.edit",$data);
    }

    /**
     * 接收编辑专业的数据
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profession $profession)
    {
        // 接收数据 
        $data = $request->only(["logo","profession_name","sort"]);
        // 校验数据
        $rules = [
            // unique: 表名,字段名,忽略当前id
            "profession_name" => "required|unique:profession,profession_name," . $profession->id,
            "sort"         => "numeric",
        ];


        // 获取校验结果对象
        $validator = Validator::make($data, $rules);
        
        // 判断校验是否失败了
        if( $validator->fails() ){
            return ["message"=>$validator->messages()->all(), "status"=>false];
        }

        // 保存数据
        $profession = $profession->update($data);

        // 返回结果
        if($profession){
            return ["message"=>"保存专业成功！", "status"=>true];
        }else{
            return ["message"=>"保存专业失败！", "status"=>false];
        }
        
    }

    /**
     * 删除专业
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $professionModel = Subject::all();

        $profession = $professionModel->find($id);
        // $res = $profession->forceDelete(); // 永久删除Profession $profession
        $res = $profession->delete();   // 软删除[在开启了软删除]
        if( $res ){
            return ["message"=>"删除成功！","status"=>true];
        }else{
            return ["message"=>"删除失败！","status"=>false];
        }
    }

    /**
     * ajax请求专业列表
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax_list(Request $request, Profession $profession)
    {
        // $sql = 'select id from subject where 1';
        // dd($profession->select($sql));
        // 判断是否是ajax请求
        // if( !$request->ajax() ){
        //     return ["message"=>"非法请求","status"=>False];
        // }
        // 获取专业信息
        $data  = $profession->get();    // 数据
        $cnt   = $profession->count();  // 数据的总数量

        // 返回专业信息[格式必须按照dataTable的要求进行返回]
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
