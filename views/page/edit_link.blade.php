<form class="mt-3" action="{{ $host }}/upd_link_do.php" method="post">
      <button  onclick="conf()"  type="button" class="btn btn-outline-danger float-right">
        Удалить
      </button>
      <script>


       function conf() {

         result = confirm("Удалить ссылку - {{ $data['name'] }} ?");
         if (result) {  window.location = '{{ $host}}/del_link_do.php?ptoken={{ $data["ptok"] }}&id={{ $data["id"] }}';   }

       }

      </script>
      <div class="form-group ">
        <label for="idn">ID:</label>
        <label for="id">{{ $data["id"] }}</label>
      </div>
      <div class="form-group float-right">
        <label for="daten">Дата и время создания:</label>
        <label for="date">{{ $data["dt"] }}</label>
      </div>

      <div class="form-group">
        <label for="name">Название</label>
        <input name="name" type="text" class="form-control" id="name" aria-describedby="namel" value="{{ $data['name'] }}">

      </div>

      <div class="form-group">
        <label for="url">Полный путь</label>
        <input  name="furl" type="text" class="form-control" id="url" aria-describedby="furl" value="{{ $data["furl"] }}">

      </div>

      <div class="form-group">
        <label for="surl">Короткий путь</label>
        <input name="surl" type="text" class="form-control" id="surl" aria-describedby="surl" value="{{ $data["surl"] }}">

      </div>

      <input type="hidden"   name="ptoken"    value="{{ $data["ptok"] }}">
      <input type="hidden"   name="id"    value="{{ $data["id"] }}">

      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="CheckWork" name="work"
        @if ( $data['work'] == 1 )
          checked
         @elseif ($data['work'] == 0)
	         unchecked
           @endif
           >
        <label class="form-check-label" for="CheckWork">Перенаправление включено</label>
      </div>

      <a href="{{ $host}}/svg/surl/{{ $data["surl"] }}.svg" target="_blank" type="button" class="btn btn-info btn  ml-1">Скачать QR</a>
      <img id='barcode'
            src="{{ $host}}/svg/surl/{{ $data["surl"] }}.svg"
            width="50"
            height="50" />
      <div class="float-right">
        <button type="submit" class="btn btn-primary">Сохранить</button>

      </div>
    </form>
