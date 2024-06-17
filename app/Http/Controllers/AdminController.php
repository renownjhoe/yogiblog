<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function show($user){
        $user = User::findOrFail($user);
        return view('users.show', compact('user'));
    }
}
