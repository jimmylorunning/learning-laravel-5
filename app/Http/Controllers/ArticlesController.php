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

  public function show(Article $article)
  {
// route model binding means we'll get the article directly instead of an id
// see RouteServiceProvider.php
//    $article = Article::findOrFail($id);

/*  // use this if using just find() instead of findOrFail()  
    if (!$article)
      abort(404); */
//    dd($article->published_at);
    return view('articles.show', compact('article'));
  }

  public function create()
  {
    $tags = \App\Tag::lists('name', 'id');
    return view('articles.create', compact('tags'));
  }

  /**
   * Edit an existing article.
   * 
   * @return Response
   */
  public function edit(Article $article)
  {
//    $article = Article::findOrFail($id);
    $tags = \App\Tag::lists('name', 'id');
    return view('articles.edit', compact('article', 'tags'));
  }

  /**
   * Update an existing article.
   * 
   * @return Response
   */
  public function update(Article $article, Requests\ArticleRequest $request)
  {
 //   $article = Article::findOrFail($id);
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
/*
    $article = new Article($request->all());
    Auth::user()->articles()->save($article);
*/
    $article = Auth::user()->articles()->create($request->all());
    $article->tags()->attach($request->input('tag_list'));
//    session()->flash('flash_message', 'Your article has been created!');
    return redirect('articles')->with([
      'flash_message' => 'Your article has been created',
      'flash_message_important' => true
    ]);
  }
}
