@extends ('layouts.portal')

@section ('content')
	<h1>{{ $treatment->name }}</h1>
	<div>{{ $treatment->symptoms }}</div>
	<div>{{ $treatment->medications }}</div>
@stop
