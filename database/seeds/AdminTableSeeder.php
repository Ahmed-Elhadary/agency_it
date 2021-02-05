<?php

use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use Illuminate\Support\Str;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group =\App\Models\Group::create([
            'name'  =>'مجموعه التحكم الكامل'
        ]);
        $admin = \App\Models\Admin::create([
            'name' => 'ahmed mohammed',
            'email' => 'hadary@company.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'group_id'  =>$group->id
        ]);

        \App\Models\Permission::create([
            'group_id'  => $group->id
        ]);
    }
}
