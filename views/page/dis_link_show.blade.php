<div class="card border-secondary m-3  ">
        <div class="card-header">

          <div class="float-right">
            <span class="badge badge-secondary ">{{ $line['count'] }}</span>
          </div>

          <span class="badge badge-secondary ">{{ $line['id'] }}</span>
          {{ $line['name'] }}

        </div>

        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <div style="float: right;">
              <button onclick="cpFun('f{{ $line['id'] }}')" type="button" class="btn btn-light btn-sm" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                <small> Копия</small>
              </button>
            </div>
            <small   class="form-text text-muted">Полный путь</small>
            <div>
              <a id="f{{ $line['id'] }}" href="{{ $line['furl'] }} " target="_blank"> {{ $line['furl'] }} </a>
            </div>
          </li>
          <li class="list-group-item">

            <div class="float-right">

              <button onclick="cpFun('s{{ $line['id'] }}')" type="button" class="btn btn-light btn-sm "><small> Копия </small></button>
            </div>
            <small   class="form-text text-muted">Сокращенный путь</small>
            <a id="s{{ $line['id'] }}" href="{{ $host }}/{{ $line['surl'] }}" target="_blank"> {{ $host }}/{{ $line['surl'] }} </a>
          </li>
          <li class="list-group-item  ">
            <a href="{{ $host}}/svg/surl/{{ $line["surl"] }}.svg" target="_blank" type="button" class="btn btn-secondary btn  ml-1 float-right">Скачать QR</a>



          </li>
        </ul>
      </div>
      <textarea id="t{{ $line['id'] }}" style="display:none;" >
      </textarea>
       <script>
       function cpFun(id){
         var copyText = document.getElementById(id);
         var insText  = document.getElementById("t{{ $line['id'] }}");
         href=copyText.getAttribute('href', 2);
         insText.value=href;
         insText.style.display="block";
         insText.select();
         document.execCommand("copy");
         alert("Copied the text: " + insText.value);
         insText.style.display="none";
       }
       </script>
