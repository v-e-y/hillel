<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Preset Order statuses.
        $ordersStatuses = ['In process', 'Complete', 'New'];

        // Insert statuses
        DB::insert(
            'insert into orders_statuses (status) values (?), (?), (?)',
            $ordersStatuses
        );

        // Create Users.
        $users = User::factory(10)->create();
        
        // Create Order(s) for each user.
        $users->each(function($user) use ($ordersStatuses) {
            Order::factory()
                ->state([
                    'orders_statuses_id' => rand(1, count($ordersStatuses)),
                    'user_id' => $user->id
                ])
                ->create();
        });
    }
}
