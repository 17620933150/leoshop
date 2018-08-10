<?php

use Illuminate\Database\Seeder;
use App\Models\Stream;
class StreamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Stream $stream)
    {
      // 清空表数据
      $stream->truncate();
      $stream->create(['id'=>1,'stream_name'=>'room-1']);
      $stream->create(['id'=>2,'stream_name'=>'room-2']);
    }
}
