@extends('layouts.app')

@foreach($paste as $el)
    @section('titleblock'){{ $el->title }}@endsection

    @section('content')
        <h1>{{ $el->title }}</h1>
        <div class="alert alert-info">
            @if (isset($el->syntax))
                <pre class="prettyprint lang-{{$el->syntax}}">{{ $el->text }}</pre>
            @else
                <p>{{ $el->text }}</p>
            @endif

            <p><small>Создан {{ $el->created_at }}</small></p>

        </div>
    @endsection
@endforeach




