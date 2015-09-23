<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use Carbon\Carbon;

class ArticlesController extends Controller
{
  public function index() 
  {
    $articles = Article::latest()->get();
    return view('articles.index', compact('articles'));
  }

  public function show($id)
  {
    $article = Article::findOrFail($id);
/*  // use this if using just find() instead of findOrFail()  
    if (!$article)
      abort(404); */
    return view('articles.show', compact('article'));
  }

  public function create()
  {
    return view('articles.create');
  }

  public function store()
  {
    // note: change the use line up above to use Request; instead of the default use Illuminate\Http\Request;
    $input = Request::all();
    $input['published_at'] = Carbon::now();
//    return $input;
    Article::create($input);
    return redirect('articles');
  }
}