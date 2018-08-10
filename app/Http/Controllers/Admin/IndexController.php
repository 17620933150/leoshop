<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index() {
        return view('admin.index.index');
    }
    public function welcome() {
        return view('admin.index.welcome');
    }
    # 上传文件处理
    public function upload(Request $request){
        # 调用laravel的文件保存功能，把文件保存到七牛云
        $result = $request->file->store("images","qiniu"); // 自动根据文件生成对应的随机的文件名
        // 七牛返回的结果是上传文件的文件名，我们还要拼接下域名，才能提供给用户正确访问
        $domain = config("filesystems.disks.qiniu.domain");
        if($result){
            return ["data"=>$domain."/".$result,"status"=>true];
        }else{
            return ["data"=>"","status"=>false];
        }
    }

}