<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PriceQuery;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $queries = PriceQuery::orderBy('id','desc')->paginate(20);
        return view('backend.dashboard.index',compact('queries'));
    }
}
