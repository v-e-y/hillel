<?php

namespace Database\Seeders;

use App\Models\Board;
use App\Models\Card;
use App\Models\Column;
use App\Models\Comment;
use App\Models\Notification;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @return void
     */
    public function run()
    {
        // Ask user how many items he wants to create/generate
        $howManyUsersToCreate = (int) $this->command->ask('How many users do you need?', 10);
        $howManyBoardsToCreate = (int) $this->command->ask('How many Boards do you need?', 1);
        $howManyColumnsPerBoardCreate = (int) $this->command->ask('How many Columns per Board do you need?', 1);
        $howManyCardsPerUCCreate = (int) $this->command->ask('How many Cards per User and Card do you need?', 1);
        $howManyCommentsCreate = (int) $this->command->ask('How many Comments you need?', 1);

        // Create User(s)
        $user = User::factory($howManyUsersToCreate)->create();

        $user->each(function ($user) use (
            $howManyBoardsToCreate,
            $howManyColumnsPerBoardCreate,
            $howManyCardsPerUCCreate,
            $howManyCommentsCreate
        ) {
            // Create Board with random user (which will be owner) id
            Board::factory($howManyBoardsToCreate)
                ->state([
                    'author_id' => User::all()->random()->id
                ])
                ->create();

            // Made users which id is even a member of the boards
            if ($user->id % 2 === 0) {
                $user->boardsMember()->attach(Board::all()->random()->id);
            }

            // Create and add column to the random board
            Column::factory($howManyColumnsPerBoardCreate, [
                    'board_id' => Board::all()->random()->id
                ])
                ->create();

            // Create card(s) for all users
            Card::factory($howManyCardsPerUCCreate)
                ->state([
                    'column_id' => Column::all()->random()->id,
                    'executor_id' => ($user->id % 2 === 0) ? $user->id : null
                ])
                ->for($user)
                ->create();

            // Create comment(s) for all users
            Comment::factory($howManyCommentsCreate)
                ->state([
                    'user_id' => User::all()->random()->id,
                    'card_id' => Card::all()->random()->id
                ])
                ->create();

            $notification = Notification::factory()
                ->state([
                    'card_id' => Card::all()->random()->id
                ])
                ->create();

            Subscription::factory()
                ->state([
                    'user_id' => User::all()->random()->id,
                    'card_id' => Card::all()->random()->id
                ])
                ->create();

            $notification->subscriptions()
                ->attach(Subscription::all()->random()->id);
        });
    }
}
