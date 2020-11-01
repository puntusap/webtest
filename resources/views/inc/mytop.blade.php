@isset($mytop)
    <div class="">
        <h3>Топ-10 моих паст</h3>
        <ol class="top">
            @foreach( $mytop as $el)
                <li>
                    <a href="\{{$el->hash}}">{{ $el->title }}</a>
                </li>
            @endforeach
        </ol>
    </div>
@endisset
