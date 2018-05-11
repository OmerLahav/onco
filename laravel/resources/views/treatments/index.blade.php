@extends ('layouts.portal')

@section ('content')
    <div class="page-wrapper">
        <div class="page-wrapper-container">
            <h1>All treatments</h1>
            <a href="{{ route('treatments.create') }}" class="btn btn-info add-btn bg-info"><i class="fas fa-plus"></i>Add</a>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <?php
                $srNo = 1; ?>
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
                            <a href="#" class="btn btn-primary opt-btn fa fa-edit"><span class="edit "> Edit </span></a>
                            <a href="#" class="btn btn-danger opt-btn far fa-trash-alt"><span class="edit del">Delete</span></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-styles/pages/admin-index.css') }} ">
@stop