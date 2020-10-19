<form class="mt-3">


        <button onclick="conf()" type="button"  class="btn btn-outline-danger float-right">Удалить</button>
        <script>


         function conf() {

           result = confirm("Удалить страницу - {{ $data["name"] }} ?");
           if (result) {  window.location = '{{ $host }}/del_cat_line_do.php?ptoken={{ $data["ptok"] }}';   }

         }

        </script>
        <div class="form-group ">
          <label for="idn">ID:</label>
          <label for="id">{{ $data["id"] }}</label>
        </div>
        <div class="form-group">
          <label for="name">Название</label>
          <input type="text" class="form-control" id="name" aria-describedby="nameh" value="{{ $data["name"] }}">

        </div>
{{-- <div class="form-group">
  <label for="url">Ссылка с правами выключения, добавления, удаления, редактирования</label>
  <input type="text" class="form-control" id="url" aria-describedby="urlh">

</div>

<div class="form-group">
  <label for="url">Ссылка только для просмотра</label>
  <input type="text" class="form-control" id="url" aria-describedby="urlh">

</div> --}}


      {{--  <button type="submit" class="btn btn-primary float-right">Сохранить</button> --}}
      </form>
