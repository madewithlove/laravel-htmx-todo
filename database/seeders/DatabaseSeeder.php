<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\TodoItem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        TodoItem::factory()->count(5)->create();
        TodoItem::factory()->create([
            'name' => 'Do the dishes',
            'status' => 'done',
        ]);
    }
}
