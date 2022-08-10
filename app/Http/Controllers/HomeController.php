<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->id();
        $workshop_id = DB::table('workshops as w')
        //->distinct()
        ->join('user_workshop as uw', 'w.id', '=', 'uw.workshop_id')
        ->where('categorie_id', 1)
        ->where('user_id', $user_id)
        ->pluck('name_workshop','w.id');

        return view('home',compact('workshop_id'));
    }
}
