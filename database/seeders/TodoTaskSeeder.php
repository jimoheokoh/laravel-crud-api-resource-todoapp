<?php

namespace Database\Seeders;

use App\Models\TodoTask;
use Illuminate\Database\Seeder;

class TodoTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TodoTask::insert([
            [
                'id' => 1,
                'name' => 'Buy Vegetables',
                'description' => 'Buy Spinach, Ugu, Pepper, Carrots not more than #10',
                'due' => '2021-01-21',
                'completed' => false,
                'todo_list_id' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Topup Electricity Units',
                'description' => null,
                'due' => '2021-01-15',
                'completed' => true,
                'todo_list_id' => 1,
            ],
            [
                'id' => 3,
                'name' => 'Order Gold Watch',
                'description' => null,
                'due' => '2021-03-15',
                'completed' => false,
                'todo_list_id' => 1,
            ]
            ,
            [
                'id' => 4,
                'name' => 'Bake Jimmy\'s Cake',
                'description' => 'Prepare a birthday cake for Jimoh',
                'due' => '2021-03-05',
                'completed' => true,
                'todo_list_id' => 2,
            ]
        ]);
    }
}
