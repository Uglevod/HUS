    <a href="{{ $host }}/add/page/{{ $data["ctok"] }}" target="_blank" type="button" class="btn btn-outline-warning ">Добавить страницу</a>
{{--
    @if ( $sw == 1)
    <a href="{{ $host }}/edit/cat/{{ $data["ctok"] }}/0"   type="button" class="btn btn-outline-info m-1">Показать выключенные страницы</a>
    @elseif ( $sw == 0)
    <a href="{{ $host }}/edit/cat/{{ $data["ctok"] }}/1"   type="button" class="btn btn-outline-info m-1">Показать включенные страницы</a>
    @endif
--}}
    <a href="{{ $host }}/show/cat/{{ $data["stok"] }}/{{ $sw }}" target="_blank" type="button" class="btn btn-success m-1">Режим просмотра</a>
  {{--  <a href="" target="" type="button" class="btn btn-dark ">Выход</a> --}}
