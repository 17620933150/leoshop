<?php

use Illuminate\Database\Seeder;
// 学科数据种子填充类
use App\Models\Subject;
class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Subject $subject)
    {
      // 添加学科的测试数据
      $subject->truncate(); // 清空表，并且会重置ID
      $subject->create(['id'=>1,'subject_name'=>'PHP','sort'=>mt_rand(1,100)]);
      $subject->create(['id'=>2,'subject_name'=>'Javascript','sort'=>mt_rand(1,100)]);
      $subject->create(['id'=>3,'subject_name'=>'全栈','sort'=>mt_rand(1,100)]);
      $subject->create(['id'=>4,'subject_name'=>'Python','sort'=>mt_rand(1,100)]);
      $subject->create(['id'=>5,'subject_name'=>'UI','sort'=>mt_rand(1,100)]);
      $subject->create(['id'=>6,'subject_name'=>'广告设计','sort'=>mt_rand(1,100)]);
    }
}
