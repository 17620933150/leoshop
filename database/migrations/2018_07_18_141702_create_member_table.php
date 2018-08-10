<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 会员表
        Schema::create('member', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->increments('id')->comment('主键ID');
            $table->unsignedTinyInteger('type') ->default(1) ->comment('会员类型(1：学生,2:老师)');
            $table->string('username',150)->unique()->comment('帐号');
            $table->string('nickname',150)->nullable()->comment('昵称');
            $table->string('avatar',255)->nullable()->comment('头像');
            $table->unsignedTinyInteger('sex')->default(1)->comment('性别');
            $table->string('password',255)->comment('密码');
            $table->string('email',150)->nullable() ->unique()->comment('邮箱');
            $table->string('phone',50)->nullable()->unique()->comment('手机号码');
            $table->unsignedInteger('sort')->default(0)->comment('排序');
            $table->unsignedTinyInteger('education')->default(null)->comment('学历');
            $table->string('job',50)->nullable()->comment('职业');
            $table->unsignedInteger('login_rec')->default(0)->comment('登录次数');
            $table->char('login_ip',30)->nullable()->comment('登录IP');
            $table->timestamp('disabled_at')->nullable()-> comment('启用状态');
            $table->timestamps();
            $table->softDeletes();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member');
    }
}
