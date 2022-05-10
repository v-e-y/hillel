<?php

namespace Database\Seeders;

use App\Models\Board;
use App\Models\Card;
use App\Models\Column;
use App\Models\User;
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
        /*
        User::factory(3)->has(
            Board::factory(4)
        )->create();
        */

        factory(User::class, 10)->create()->each(function ($user) {
            
        });

        //User::factory(3)->create();
        //Board::factory(5)->create();
        //Column::factory(15)->create();
        //Card::factory(35)->create();        
    }
}
