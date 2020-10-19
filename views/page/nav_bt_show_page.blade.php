{{-- <a href="{{ $host }}/add/link/{{ $data["ptok"] }}" target="_blank" type="button" class="btn btn-outline-success ">Добавить ссылку</a>
 --}}
@if ( $sw == 1)
<a href="{{ $host }}/show/page/{{ $data["stok"] }}/0"   type="button" class="btn btn-outline-info m-1">Показать выключенные ссылки</a>
@elseif ( $sw == 0)
<a href="{{ $host }}/show/page/{{ $data["stok"] }}/1"   type="button" class="btn btn-outline-info m-1">Показать включенные ссылки</a>
@endif

{{-- <a href="{{ $host }}/show/page/{{ $data["stok"] }}/{{ $sw }}" target="_blank" type="button" class="btn btn-warning m-1">Режим просмотра</a>
 <a href="" target="" type="button" class="btn btn-dark ">Выход</a> --}}
