<form class="mt-3" action="{{ $host }}/add_page_do.php" method="post">



      <div class="form-group">
        <label for="name">Название страницы ссылок </label>
        <input type="text" class="form-control" name="name"   aria-describedby="nameh">
        <input type="hidden"   name="ctoken"    value="{{ $ctok }}">
      </div>








      <button type="submit" class="btn btn-primary float-right">Создать</button>
    </form>
