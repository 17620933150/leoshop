<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 创建 点播课时表
        Schema::create('lesson', function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->increments('id')->comment('主键ID');
            $table->unsignedInteger('course_id')->comment('课程ID');
            $table->string('lesson_name',150)->comment('课时标题');  // varchar
            $table->string('cover',255)->nullable()->comment('封面图');
            $table->string('video_address',255)->nullable()->comment('视频url地址');
            $table->text('lesson_desc')->nullable()->comment('课时简介');
            $table->unsignedSmallInteger('duration')->default(0)->comment('视频时长(单位：分钟)');
            $table->unsignedInteger('sort')->default(0)->comment('排序');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // 删除 点播课时表
        Schema::dropIfExists('lesson');
    }
}
