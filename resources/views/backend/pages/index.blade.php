@extends('backend.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            <p>{{ $pageSubTitle }}</p>
        </div>
        <a href="{{ route('admin.pages.create') }}" class="btn btn-primary pull-right">Add New Page</a>
    </div>
    @include('backend.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th>Image</th>
                            <th> Title</th>
                            <th>Name</th>
                            <th>Menu</th>
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pages as $key=>$page)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td><img src="{{ asset('storage/'.$page->image) }}" width="80"></td>
                                <td>{{ $page->title }}</td>
                                <td>{{ $page->site->name }}</td>
                                <td>{{ $page->menu->title }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Second group">
                                        <a href="{{ route('admin.pages.edit', $page->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                        <a onclick="return confirm('Are you sure?')" href="{{ route('admin.pages.delete', $page->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('public/backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush
