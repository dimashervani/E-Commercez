<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $order = order::latest()->paginate(5);
    
        return view('order.index',compact('order'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
