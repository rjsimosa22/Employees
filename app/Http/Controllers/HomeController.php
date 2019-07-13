<?php

namespace App\Http\Controllers;

use Cache;
use App\Home;
use Illuminate\Http\Request;


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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $options='Home';
        $selects='Home';
        $homes=Cache::put('key',Home::select('a.id','a.name','a.description','a.route','a.selects')->from('tables_system as a')->orderby('a.description')->get());
        return view('home',['options'=>$options,'selects'=>$selects]);
    }
}
