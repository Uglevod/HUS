<form class="mt-3" action="{{ $host }}/add_link_do.php">

      <div class="form-group">
        <label for="name">Название</label>
        <input name="name" type="text" class="form-control" id="name" aria-describedby="name">

      </div>

      <div class="form-group">
        <label for="url">Полный путь</label>
        <input name="furl" type="text" class="form-control" id="url" aria-describedby="furl">

      </div>
      <input type="hidden"   name="ptoken"    value="{{ $data["ptok"] }}">
      <button type="submit" class="btn btn-primary float-right">Создать</button>
    </form>
