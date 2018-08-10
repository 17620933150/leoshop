<?php

namespace App\Models;
// 会员模型
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes; // 引入Laravel内置的软删除功能
class Member extends Authenticatable
{
    // 软删除
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    // 表名
    protected  $table = "member";
    // 主键
    protected  $primaryKey = "id";
    // 设置白名单属性[允许用户编辑和修改的字段有哪些]
    protected  $fillable = ["type","username","nickname","avatar","sex","password","email","phone","sort","education","job","login_rec","login_ip","disabled_at"];

    // 属性转换[字段值的类型帮我们进行转换]
    // protected $casts = [];
    

    // 声明点播课时与点播课程之间的模型关联关系

}
