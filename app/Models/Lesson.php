<?php

namespace App\Models;
// 点播课时模型
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // 引入Laravel内置的软删除功能
class Lesson extends Model
{
    // 软删除
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    // 表名
    protected  $table = "lesson";
    // 主键
    protected  $primaryKey = "id";
    // 设置白名单属性[允许用户编辑和修改的字段有哪些]
    protected  $fillable = ["course_id","lesson_name","cover","video_address","lesson_desc","duration","sort"];

    // 属性转换[字段值的类型帮我们进行转换]
    // protected $casts = [];
    

    // 声明点播课时与点播课程之间的模型关联关系
    public function course(){
        return $this->belongsTo(\App\Models\Course::class,"course_id","id");
    }
}
