<?php

use Illuminate\Database\Seeder;

use App\Models\System\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => 'Админ',
                'login' => 'admin',
                'password' => bcrypt('admin'),
            ],
        ]);
    }
}
