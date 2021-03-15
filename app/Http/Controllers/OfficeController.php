<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class OfficeController extends Controller
{
    public function save_to_txt()
    {
        $users = User::all();

        foreach ($users as $user) {
            dump($user);
        }

//        Storage::put('users.csv', $users);
    }
}
