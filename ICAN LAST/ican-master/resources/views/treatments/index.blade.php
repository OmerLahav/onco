@extends ('layouts.portal')

@section ('content')
	<h1>All treatments</h1>
	<a href="{{ route('treatments.create') }}" class="btn btn-info pull-right">Create</a>
    <table id="example" class="display table" cellspacing="0" width="100%">
    <thead>
        <?php $srNo=1; ?>
        <tr>
            <th>Sr #</th>
            <th>Treatment Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        	@foreach ($treatments as $treatment)
        <tr>
            <td>{{$srNo++}}</td>
            <td><a href="{{ route('treatments.show', [$treatment]) }}">{{ $treatment->name }}</a></td>
            <td>{{$treatment->description}}</td>
            <td>
                <a href="#" class="btn btn-primary fa fa-edit"></a>
               <a href="#" class="btn btn-danger fa fa-trash"></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!--<script>
$(document).ready(function() {
    $('#example').DataTable( {
        responsive: true
    } );
} );
</script>


<style>
table th:nth-child(3), td:nth-child(3) {
  display: none;
}
</style>-->

@stop