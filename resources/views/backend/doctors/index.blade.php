@extends('backend.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            <p>{{ $pageSubTitle }}</p>
        </div>
        <a href="{{ route('admin.doctors.create') }}" class="btn btn-primary pull-right">Add new doctor</a>
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
                            <th>Department</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Available Time</th>
                            <th class="text-center">Status</th>
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($doctors as $key=>$doctor)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td><img src="{{ asset('storage/'.$doctor->image) }}" width="80"></td>
                                <td>{{ $doctor->page->title }}</td>
                                <td>{{ $doctor->name }}</td>
                                <td>{{ $doctor->designation }}</td>
                                <td>{{ $doctor->available_time }}</td>
                                <td class="text-center">
                                    @if ($doctor->status == 1)
                                        <span class="badge badge-success">Yes</span>
                                    @else
                                        <span class="badge badge-danger">No</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Second group">
                                        <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                        <a onclick="return confirm('Are you sure?')" href="{{ route('admin.doctors.delete', $doctor->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
