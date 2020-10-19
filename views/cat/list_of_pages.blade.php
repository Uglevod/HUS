@foreach ($data as $line)

@if ($line["work"] == 1)
	@include('cat/enabled_page_edit')

@elseif ($line["work"] == 0)
	@include('cat/disabled_page_edit')
@endif


@endforeach
