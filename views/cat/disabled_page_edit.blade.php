<div class="card border-secondary m-3  ">
          <div class="card-header">
            
{{-- <div class="float-right">
 <span class="badge badge-secondary ">{{ $line['scount'] }}</span>
</div> --}}


            <span class="badge badge-secondary ">{{ $line['id'] }}</span>
            {{ $line['name'] }}

          </div>

          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div style="float: right;">
                <button type="button" class="btn btn-light btn-sm" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                  <small> Копия </small>
                </button>
              </div>
              <small   class="form-text text-muted">Адрес страницы для редактирования</small>
              <div class="text-muted ">

                <a clas="text-muted " style="color:#6c757d" href="{{ $host }}/edit/page/{{ $line['ptok'] }}" target="_blank"> {{ $host }}/edit/page/{{ $line['ptok'] }} </a>
              </div>
            </li>
            <li class="list-group-item">
              <div style="float: right;">
                <button type="button" class="btn btn-light btn-sm" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                  <small> Копия </small>
                </button>
              </div>
              <small   class="form-text text-muted">Адрес страницы для просмотра</small>
              <div class="text-muted ">
                <a class="text-muted " href="{{ $host }}/show/page/{{ $line['stok'] }}" target="_blank">{{ $host }}/show/page/{{ $line['stok'] }}</a>

              </div>
            </li>

            <li class="list-group-item  ">
              <button type="button" class="btn btn-secondary float-right  ">
                Редактировать
              </button>

            </li>
          </ul>
        </div>
