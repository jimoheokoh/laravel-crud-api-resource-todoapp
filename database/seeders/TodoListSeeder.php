<?php

namespace Database\Seeders;

use App\Models\TodoList;
use Illuminate\Database\Seeder;

class TodoListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TodoList::insert([
            [
                'id' => 1,
                'name' => 'Shopping List',
                'user_id' => 1
            ],
            [
                'id' => 2,
                'name' => 'Visiting List',
                'user_id' => 2
            ],
        ]);
    }
}
