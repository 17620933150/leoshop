<?php

namespace App\Models;
// 点播课程模型
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // 引入Laravel内置的软删除功能
class Course extends Model
{
    // 软删除
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    // 表名
    protected  $table = "course";
    // 主键
    protected  $primaryKey = "id";
    // 设置白名单属性[允许用户编辑和修改的字段有哪些]
    protected  $fillable = ["profession_id","course_name","price","sale_price","teacher_id","course_desc","click","duration","sort","expire_at","number","content","cover"];

    // 属性转换[字段值的类型帮我们进行转换]
    // protected $casts = [];
    

    // 声明点播课程与专业之间的模型关联关系
    public function profession(){
        return $this->belongsTo(\App\Models\Profession::class,"profession_id","id");
    }

    // 声明点播课程与会员之间的模型关联关系
    public function Member(){
        return $this->belongsTo(\App\Models\Member::class,"teacher_id","id");
    }
}
