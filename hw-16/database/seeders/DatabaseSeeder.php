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
        $ordersStatuses = ['In process', 'Completed', 'New'];

        // Insert statuses
        DB::insert(
            'insert into orders_statuses (status) values (?), (?), (?)',
            $ordersStatuses
        );

        DB::table('last_bot_update_ids')->insert([
            'update_id' => 0,
            'bot_id' => 5589222126
        ]);

        // Create Users.
        $users = User::factory(10)->create();

        // Create Order(s) for each user.
        $users->each(function ($user) use ($ordersStatuses) {
            Order::factory()
                ->state([
                    'order_status' => Arr::random($ordersStatuses),
                    'user_id' => $user->id
                ])
                ->create();
        });
    }
}
