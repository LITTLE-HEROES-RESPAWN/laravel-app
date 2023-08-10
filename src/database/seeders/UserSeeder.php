<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1111111, 2222222, 3333333のログインIDのユーザーを作成する
        User::factory()->state(['login_id' => '1111111'])->create();
        User::factory()->state(['login_id' => '2222222'])->create();
        User::factory()->state(['login_id' => '3333333'])->create();
    }
}
