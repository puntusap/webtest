@isset($top)
<div class="">
    <h3>Топ-10 public-паст</h3>
    <ol class="top">
        @foreach( $top as $el)
            <li>
                <a class="badge badge-primary" href="\{{$el->hash}}">{{ $el->title }}</a>
            </li>
        @endforeach
    </ol>
</div>
@endisset