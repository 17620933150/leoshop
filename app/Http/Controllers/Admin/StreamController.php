<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Stream;
use Validator;

class StreamController extends Controller
{
    /**
     * 直播流展示.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("admin.stream.index");
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.stream.add');
    }

    /**
     * 添加数据
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Stream $stream)
    {
         // 接收数据 
        $data = $request->only(["logo","stream_name","sort"]);

        // 保存数据
        $stream = $stream->create($data);
        // $stream = Subject::create($data)

        // 返回结果
        if($stream){
            return ["message"=>"添加直播流成功！", "status"=>true];
        }else{
            return ["message"=>"添加直播流失败！", "status"=>false];
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
     * 显示编辑直播流的表单
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Stream $stream)
    {
        $data["streamInfo"] = $stream;
        return view("admin.stream.edit",$data);
    }

    /**
     * 接收编辑直播流的数据
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stream $stream)
    {
        // 接收数据 
        $data = $request->only(["logo","stream_name","sort"]);

        // 保存数据
        $stream = $stream->update($data);

        // 返回结果
        if($stream){
            return ["message"=>"保存直播流成功！", "status"=>true];
        }else{
            return ["message"=>"保存直播流失败！", "status"=>false];
        }
        
    }

    /**
     * 删除直播流
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $streamModel = Subject::all();

        $stream = $streamModel->find($id);
        // $res = $stream->forceDelete(); // 永久删除Stream $stream
        $res = $stream->delete();   // 软删除[在开启了软删除]
        if( $res ){
            return ["message"=>"删除成功！","status"=>true];
        }else{
            return ["message"=>"删除失败！","status"=>false];
        }
    }

    /**
     * ajax请求直播流列表
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax_list(Request $request, Stream $stream)
    {
        // $sql = 'select id from subject where 1';
        // dd($stream->select($sql));
        // 判断是否是ajax请求
        if( !$request->ajax() ){
            return ["message"=>"非法请求","status"=>False];
        }
        // 获取直播流信息
        $data  = $stream->get();    // 数据
        $cnt   = $stream->count();  // 数据的总数量

        // 返回直播流信息[格式必须按照dataTable的要求进行返回]
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
