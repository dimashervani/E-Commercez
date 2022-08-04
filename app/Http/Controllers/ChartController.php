<?php

namespace App\Http\Controllers;

use App\Models\Chart;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index()
    {
        $chart = chart::latest()->paginate(5);
    
        return view('chart.index',compact('chart'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
