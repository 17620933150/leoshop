<?php

namespace App\Models;
// 专业模型
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // 引入Laravel内置的软删除功能
class Profession extends Model
{
    // 软删除
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    // 表名
    protected  $table = "profession";
    // 主键
    protected  $primaryKey = "id";
    // 设置白名单属性[允许用户编辑和修改的字段有哪些]
    protected  $fillable = ["subject_id","profession_name","price","sale_price","expire_at","number","teacher_ids","content","cover","banner","profession_desc","click","duration","is_recommend","is_best","is_hot","sort"];

    // 属性转换[字段值的类型帮我们进行转换]
    protected $casts = [
        "teacher_ids" => "array",  # 添加/编辑数据的时候，会自动帮我们把array数组转换成json
        "banner"      => "array",   
    ];

    // 关联当前专业模型和学科模型的关系
    public function subject(){
        return $this->belongsTo(\App\Models\Subject::class, 'subject_id', 'id');
    }

}
