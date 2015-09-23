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
    $articles = Article::latest('published_at')->published()->get();
    return view('articles.index', compact('articles'));
  }

  public function show($id)
  {
    $article = Article::findOrFail($id);
/*  // use this if using just find() instead of findOrFail()  
    if (!$article)
      abort(404); */
//    dd($article->published_at);
    return view('articles.show', compact('article'));
  }

  public function create()
  {
    return view('articles.create');
  }

  public function store()
  {
    // note: change the use line up above to use Request; instead of the default use Illuminate\Http\Request;
    Article::create(Request::all());
    return redirect('articles');
  }
}