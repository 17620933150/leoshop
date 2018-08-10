<?php

use Illuminate\Database\Seeder;
// 直播课程数据种子
use App\Models\Live;
class LiveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Live $live)
    {
      $live->truncate();
      // 直播课程
      $live->create(['id'=>1,'profession_id'=>'1','course_name'=>'jQuery的常用事件(上)','stream_id'=>1,'teacher_id'=>2,'start_at'=>'2018-07-14 19:30:00','end_at'=>'2018-07-14 21:30:00']);
      $live->create(['id'=>2,'profession_id'=>'1','course_name'=>'前端体验班HTML串讲答疑','stream_id'=>2,'teacher_id'=>5,'start_at'=>'2018-07-14 20:30:00','end_at'=>'2018-07-14 21:30:00']);
      $live->create(['id'=>3,'profession_id'=>'2','course_name'=>'MVC思想','stream_id'=>2,'teacher_id'=>2,'start_at'=>'2018-07-14 21:45:00','end_at'=>'2018-07-14 22:45:00']);
      $live->create(['id'=>4,'profession_id'=>'2','course_name'=>'Linux入门','stream_id'=>1,'teacher_id'=>7,'start_at'=>'2018-07-15 19:30:00','end_at'=>'2018-07-15 21:30:00']);
      $live->create(['id'=>5,'profession_id'=>'2','course_name'=>'Nginx','stream_id'=>3,'teacher_id'=>9,'start_at'=>'2018-07-13 19:30:00','end_at'=>'2018-07-13 21:30:00']);
      $live->create(['id'=>6,'profession_id'=>'3','course_name'=>'Memcache','stream_id'=>3,'teacher_id'=>10,'start_at'=>'2018-07-15 17:30:00','end_at'=>'2018-07-15 19:30:00']);
      $live->create(['id'=>7,'profession_id'=>'3','course_name'=>'Redis','stream_id'=>2,'teacher_id'=>10,'start_at'=>'2018-07-13 20:00:00','end_at'=>'2018-07-15 22:00:00']);
      $live->create(['id'=>8,'profession_id'=>'3','course_name'=>'MongoDB','stream_id'=>1,'teacher_id'=>5,'start_at'=>'2018-07-13 19:30:00','end_at'=>'2018-07-13 21:30:00']);
    }
}
