@extends('app')

@section('content')
  <h1>Articles</h1>

  @foreach ($articles as $article)
    <article>
    <h2>
      <a href="{{ action('ArticlesController@show', [$article->id]) }}">{{ $article->title }}</a>
    </h2>
    <p>{{ $article->body }}</p>
    <!-- next line is just to show another way of linking to articles/id -->
    <p><a href="{{ url('/articles', $article->id) }}">Read more...</a></p>
    </article>
  @endforeach
@stop