<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use Carbon\Carbon;

class ArticlesController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth', ['only' => 'create']);
  }

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


  /**
   * Edit an existing article.
   * 
   * @return Response
   */
  public function edit($id)
  {
    $article = Article::findOrFail($id);

    return view('articles.edit', compact('article'));
  }


  /**
   * Update an existing article.
   * 
   * @return Response
   */
  public function update($id, Requests\ArticleRequest $request)
  {
    $article = Article::findOrFail($id);
    $article->update($request->all());

    return redirect('articles');
  }

  /**
   * Save a new article.
   * 
   * @param CreateArticleRequest $request
   * @return Response
   */
  public function store(Requests\ArticleRequest $request)
  {
    // note: change the use line up above to use Request; instead of the default use Illuminate\Http\Request;
    $article = new Article($request->all());
    Auth::user()->articles()->save($article);
    return redirect('articles');
  }
}