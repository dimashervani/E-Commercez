<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = user::latest()->paginate(5);
    
        return view('user.index',compact('user'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
