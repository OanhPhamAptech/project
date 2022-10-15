<?php

namespace App\Http\Controllers;

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
    return view('admin');
  }

  public function cat_nav()
  {
    // $category = DB::table('category')->where('CatStatus', '1')->orderBy('id', 'desc')->select('*');
    // $category = $category->get();
    // return view('layouts.base')->with('category', $category);
  }
}
