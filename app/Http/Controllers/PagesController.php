<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
  public function about() {
    $data = [];
    $data['first'] = 'Ji<b>mm</b>y';
    $data['last'] = 'Lo';
    $name = 'Jimmy <font color="red">Lo</font>';
    $first = 'Ji<i>mm</i>y';
    $last = 'Lo';
    /*
    return view('pages.about')->with('name', $name);
    return view('pages.about')->with([
      'first' => 'Ji<font color="red">mm</font>y',
      'last' => 'Lo'
      ]);
    */
//    return view('pages.about', $data);
    return view('pages.about', compact('first', 'last'));
  }

  function contact() {
    $people = ['Amanda Plumb', 'Catherine Moore', 'Josh Stanton'];
    return view('pages.contact', compact('people'));
  }
}

