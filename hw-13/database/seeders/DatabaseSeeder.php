<?php

namespace Database\Seeders;

use App\Models\Board;
use App\Models\Card;
use App\Models\Column;
use App\Models\Comment;
use App\Models\Notification;
use App\Models\Subscription;
use App\Models\User;
use BoardUser;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @return void
     */
    public function run()
    {
        //$howManyUsersToCreate = (int) $this->command->ask('How many users do you need?', 10);
/*
        $users = User::factory($howManyUsersToCreate)->create();

        $users->each(function($user) {
            if ($user->id % 2 === 0) {
                $boards = Board::factory()
                    ->state([
                        'user_id' => $user->id
                    ])
                    ->create();

                Column::factory()
                    ->for($boards)
                    ->create();

                $cards = Card::factory()
                    ->state([
                        'column_id' => Column::all()->random()->id
                    ])
                    ->for($user)
                    ->create();

                Comment::factory()
                    ->for($user)
                    ->for($cards)
                    ->create();
                
            } else {
                 
                Board::factory()
                    ->hasUsers()
                    ->state([
                        'user_id' => $user->id
                    ])
                    ->for($user)
                    ->create();
            }
        });

        $users::factory()->hasBoards(1, [
            'user_id' => $users->id
        ])->create();

        $notification = Notification::factory()
                            ->for($cards)
                            ->create();

        $subscription = Subscription::factory()
                            ->for($cards)
                            ->for($users)
                            ->create();
        */

        User::factory(10)->create()->each(function($user) {
            Board::factory()
                ->state([
                    'user_id' => User::all()->random()->id
                ])
                ->create();
                
            $user->boards()->attach(Board::all()->random());

            Column::factory([
                    'board_id' => Board::all()->random()->id
                ])
                ->create();

            $card = Card::factory()
                        ->state([
                            'column_id' => Column::all()->random()->id
                        ])
                        ->for($user)
                        ->create();

            Comment::factory()
                ->for($user)
                ->for($card)
                ->create();

            Notification::factory()
                ->for($card)
                ->create();

            Subscription::factory()
                ->for($card)
                ->for($user)
                ->create();

        });
    }
}
