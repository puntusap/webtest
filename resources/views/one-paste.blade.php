@extends('layouts.app')

@foreach($paste as $el)
    @section('titleblock'){{ $el->title }}@endsection

    @section('content')
        <h1>{{ $el->title }}</h1>
        <div class="alert alert-info">
            <p>{{ $el->text }}</p>
            <p><small>Создан {{ $el->created_at }}</small></p>

        </div>
    @endsection
@endforeach




