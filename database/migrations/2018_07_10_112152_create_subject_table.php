<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 创建学科表
        Schema::create("subject", function(Blueprint $table){
            $table->engine="InnoDB";
            $table->smallIncrements('id')->comment("学科ID");
            $table->string("subject_name",50)->unique()->comment("学科名称");
            $table->string("logo",255)->nullable()->comment("学科logo");
            $table->integer("sort")->default(0)->comment("排序");
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
        // 删除学科表
        Schema::dropIfExists("subject");
    }
}
