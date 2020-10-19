@foreach ($data as $line)

@if ($line["work"] == 1)
	@include('page/enb_link_show')

@elseif ($line["work"] == 0)
	  @include('page/dis_link_show')
@endif


@endforeach
