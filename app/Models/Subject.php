<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    //软删除
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    //表名
    protected $table = "subject";
    //主键
    protected $primaryKey = 'id';
    //设置白名单属性[允许用户编辑和修改的字段有哪些]
    protected $fillable = ["subject_name","logo","sort"];
}
