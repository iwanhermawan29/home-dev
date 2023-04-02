<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminsProperty;

class SimulasiKprController extends Controller
{
    public function index(Request $request)
    {


        $sales = AdminsProperty::all();

        $randomSales = $sales->random();

        return view('SimulasiKpr', compact('randomSales'));
    }
}
