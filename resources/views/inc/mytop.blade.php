<div class="">
    <h3>Топ-10 моих паст</h3>
    <ol class="top">
        @foreach( $mytop10 as $el)
            <li>
                <a href="http://127.0.0.1:8000\{{$el->hash}}">{{ $el->title }}</a>
            </li>
        @endforeach
    </ol>



</div>