@extends('app')

@section('content')
  <h1>Write a New Article</h1>

  {!! Form::open(['url' => 'articles']) !!}
    @include('articles.form', ['submitButtonText' => 'Add Article', 'multiSelectClass' => 'fancySchmancy'])
  {!! Form::close() !!}
  @include('errors.list')
@stop
