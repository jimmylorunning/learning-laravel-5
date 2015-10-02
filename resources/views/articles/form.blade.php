    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'foo' => 'bar']) !!}
    <div class="form-group">
      {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('published_at', 'Publish On:') !!}
      {!! Form::input('date', 'published_at', $article->published_at->format('Y-m-d'), ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('tag_list', 'Tags:') !!}
      {!! Form::select('tag_list[]', $tags, null, ['class' => "form-control $multiSelectClass", 'multiple']) !!}
    <div class="form-group">
      {!! Form::submit($submitButtonText, ['class' => 'btn form-control']) !!}
    </div> 

@section('scripts')
  @include('partials.select2footer', ['multiSelectClass' => $multiSelectClass])
@stop
