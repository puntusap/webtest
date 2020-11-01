@extends('layouts.app')


@section('titleblock')Поиск@endsection

@section('content')
    <h1>Поиск по пастам</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Access</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allpaste as $paste)
            <tr>
                <td><a href="{{$paste->hash}}">{{ $paste->title }}</a></td>
                <td>{{ $paste->access }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $allpaste->links() }}
@endsection

