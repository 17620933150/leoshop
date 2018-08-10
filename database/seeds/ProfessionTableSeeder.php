<?php

use Illuminate\Database\Seeder;
use App\Models\Profession;
class ProfessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Profession $profession)
    {
       // 清空表数据
      $profession->truncate();
      $profession->create(['id'=>1,'subject_id'=>1,'profession_name'=>'PHP入门班','price'=>199,'sale_price'=>100,'expire_at'=>183,'number'=>mt_rand(10,1000),'duration'=>mt_rand(200,700)]);
      $profession->create(['id'=>2,'subject_id'=>1,'profession_name'=>'PHP进阶班','price'=>399,'sale_price'=>200,'expire_at'=>365,'number'=>mt_rand(10,1000),'duration'=>mt_rand(200,700)]);
      $profession->create(['id'=>3,'subject_id'=>1,'profession_name'=>'PHP高级班','price'=>699,'sale_price'=>300,'expire_at'=>365,'number'=>mt_rand(10,1000),'duration'=>mt_rand(200,700)]);
      $profession->create(['id'=>4,'subject_id'=>1,'profession_name'=>'PHP就业班','price'=>999,'sale_price'=>400,'expire_at'=>365,'number'=>mt_rand(10,1000),'duration'=>mt_rand(200,700)]);

      $profession->create(['id'=>5,'subject_id'=>2,'profession_name'=>'Javascript入门班','price'=>399,'sale_price'=>300,'expire_at'=>183,'number'=>mt_rand(100,2000),'duration'=>mt_rand(300,800)]);
      $profession->create(['id'=>6,'subject_id'=>2,'profession_name'=>'Javascript进阶班','price'=>599,'sale_price'=>400,'expire_at'=>365,'number'=>mt_rand(100,2000),'duration'=>mt_rand(300,800)]);
      $profession->create(['id'=>7,'subject_id'=>2,'profession_name'=>'Javascript高级班','price'=>899,'sale_price'=>500,'expire_at'=>365,'number'=>mt_rand(100,2000),'duration'=>mt_rand(300,800)]);
      $profession->create(['id'=>8,'subject_id'=>2,'profession_name'=>'Javascript就业班','price'=>1199,'sale_price'=>600,'expire_at'=>365,'number'=>mt_rand(100,2000),'duration'=>mt_rand(300,800)]);  
    }
}
