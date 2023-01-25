<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function task1(Request $request)
    {
        return DB::select(DB::raw("SELECT cast(".$request->q." as decimal( 65, 5 ))"))[0];
    }


}