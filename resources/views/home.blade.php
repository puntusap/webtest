@extends('layouts.app')

@section('titleblock')Главная@endsection

@section('content')
    <h1>Заполни, пасту</h1>
    @if(session('success'))
        <div class="alert alert-success">
            <a href="/{{ session('success') }}">Паста доступна по ссылке</a>

        </div>
    @endif

    <form action="{{ route('paste-form') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Введите заголовок</label>
            <input type="text" placeholder="Введите заголовок" name="title" id="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="text">Текст</label>
            <textarea name="text" id="text" cols="30" rows="5" class="form-control" placeholder="Введите текст"></textarea>
        </div>

        <div class="form-group">
            <label for="time">Время хранения</label>
            <select name="time">
                <option value="600"> 10 минут</option>
                <option value="3600"> Час </option>
                <option value="10800"> 3 часа </option>
                <option value="86400"> День </option>
                <option value="604800"> Неделя </option>
                <option value="2592000"> Месяц</option>
                <option value="0"> Без ограничения </option>
            </select>
        </div>

        <div class="form-group">
            <label for="access">Тип доступа</label>
            <select name="access">
                <option value="public"> Публичный</option>
                <option value="unlisted"> По ссылке </option>
                @if ((Auth::check()))
                    <option value="private">Приватный</option>
                @endif

            </select>
        </div>

        <button type="submit" class="btn btn-success">Отправить</button>
    </form>

@endsection

