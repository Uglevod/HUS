<div class="card border-primary m-3  ">
        <div class="card-header justify-content-center">

{{--   <div class="float-right">
     <span class="badge badge-danger ">{{ $line['scount'] }}</span>
  </div> --}}


          <span class="badge badge-primary ">{{ $line['id'] }}</span>
            {{ $line['name'] }}
          </div>

          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div style="float: right;">
                <button onclick="cpFun('{{ $line['ptok'] }}')"  type="button" class="btn btn-light btn-sm" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                  <small> Копия </small>
                </button>
              </div>
              <small   class="form-text text-muted">Адрес страницы для редактирования</small>
              <div>
                <a id="{{ $line['ptok'] }}" href="{{ $host }}/edit/page/{{ $line['ptok'] }}" target="_blank">{{ $host }}/edit/page/{{ $line['ptok'] }}</a>
              </div>
            </li>
            <li class="list-group-item">
              <div style="float: right;">
                <button onclick="cpFun('{{ $line['stok'] }}')" type="button" class="btn btn-light btn-sm" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                  <small> Копия </small>
                </button>
              </div> 
              <small   class="form-text text-muted">Адрес страницы для просмотра</small>
              <div>
                <a id="{{ $line['stok'] }}" href="{{ $host }}/show/page/{{ $line['stok'] }}" target="_blank">{{ $host }}/show/page/{{ $line['stok'] }}</a>    </div>
            </li>

            <li class="list-group-item  ">

              <a href="{{ $host }}/edit/сpage/{{ $line['ptok'] }}" target="_blank" type="button" class="btn btn-info float-right ">

                Редактировать
              </a>

            </li>
          </ul>
        </div>
        <textarea id="{{ $line['id'] }}" style="display:none;" >
        </textarea>
         <script>
         function cpFun(cstok){
           var copyText = document.getElementById(cstok);
           var insText  = document.getElementById("{{ $line['id'] }}");
           href=copyText.getAttribute('href', 2);
           insText.value=href;
           insText.style.display="block";
           insText.select();
           document.execCommand("copy");
           alert("Copied the text: " + insText.value);
           insText.style.display="none";
         }
         </script>
