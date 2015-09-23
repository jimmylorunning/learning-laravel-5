@extends('app') 

@section('title')
About {{ $first }} {{ $last }}
@stop

@section('content')

@if ($first[0] == 'J')
<p>Unescaped: {!! $first !!}</p>
@else
<p>else!</p>
@endif

{{-- see also @ unless, foreach, forelse, etc --}}
{{-- http://laravel.com/docs/5.0/templates --}}

@stop