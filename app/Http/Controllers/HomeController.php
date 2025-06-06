<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

    }

    public function indexUsers(){
        $users = User::query()->paginate(10);
        return view('admin.users', [
            'users' => $users
        ]);
    }
}
