@extends('app')

@section('content')
  <h1>Write a New Article</h1>

  {!! Form::open(['url' => 'articles']) !!}
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', 'My Article Title', ['class' => 'form-control', 'foo' => 'bar']) !!}
    <div class="form-group">
      {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('published_at', 'Publish On:') !!}
      {!! Form::input('date', 'published_at', date('Y-m-d'), ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::submit('Add Article', ['class' => 'btn form-control']) !!}
    </div> 

  {!! Form::close() !!}
  @if ($errors->any())
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  @endif  
@stop