<?php

use Illuminate\Database\Seeder;

use App\Models\System\Status;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::insert([
            [
                'title' => 'Новая',
                'alias' => 'new',
            ],
            [
                'title' => 'Подтвержденная',
                'alias' => 'success',
            ],
            [
                'title' => 'Отмененная',
                'alias' => 'cancel',
            ],

        ]);
    }
}
