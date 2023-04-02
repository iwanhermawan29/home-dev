<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminsProperty;
use Illuminate\Support\Facades\Storage;

class SearchController extends Controller
{
    public function index(Request $request)
    {

        $sales = AdminsProperty::all();

        $randomSales = $sales->random();

        return view('SearchProperty',   compact('randomSales'));
    }
}
