@extends('layouts.app')


@section('titleblock')Мои пасты@endsection

@section('content')
    <div>
        <h1>Все мои пасты</h1>
        @isset($allpaste)
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
                        <td><a class="badge badge-primary" href="{{$paste->hash}}">{{ $paste->title }}</a></td>
                        <td>{{ $paste->access }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
    {{ $allpaste->links("pagination::bootstrap-4") }}
    @endisset
@endsection
