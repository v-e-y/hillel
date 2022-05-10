<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use phpDocumentor\Reflection\Types\Collection;

class UserController extends Controller
{
    public function getUsers()
    {
        return view('users', [
            'users' => User::all()
        ]);
    }
}