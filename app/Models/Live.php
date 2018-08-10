<?php

namespace App\Models;
// 直播课程模型
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // 引入Laravel内置的软删除功能
class Live extends Model
{
    // 软删除
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    // 表名
    protected  $table = "live";
    // 主键
    protected  $primaryKey = "id";
    // 设置白名单属性[允许用户编辑和修改的字段有哪些]
    protected  $fillable = ["profession_id","stream_id","course_name","cover","teacher_id","course_desc","sort","start_at","end_at"];

    // 属性转换[字段值的类型帮我们进行转换]
    // protected $casts = [];
    

    // 声明直播课程与专业之间的模型关联关系
    public function profession(){
        return $this->belongsTo(\App\Models\Profession::class,"profession_id","id");
    }

    // 声明直播课程与直播流之间的模型关联关系
    public function stream(){
        return $this->belongsTo(\App\Models\Stream::class,"stream_id","id");
    }
}
