<?php

namespace Database\Seeders;

use App\Models\BookStore;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookStore::factory()->count(6)->create();
    }
}
