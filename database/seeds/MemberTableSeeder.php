<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Member;
class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Member $member)
    {
        $faker = Factory::create("zh_CN");
        for($i = 0;$i< 100; $i++){
            $member->create([
                "type" => mt_rand(1,2),
                "username"=> $faker->unique()->userName,
                "nickname"=> $faker->name,
                "sex" => mt_rand(1,2),
                "password" => bcrypt("123456"),
                "email" => $faker->unique()->email,
                "phone" => $faker->unique()->PhoneNumber,
                "sort" => mt_rand(1,1000),
                "education" => mt_rand(0,4),
                "login_rec" => mt_rand(1,1000),
                "login_ip"=> $faker->ipv4,
            ]);
        }
    }
}
