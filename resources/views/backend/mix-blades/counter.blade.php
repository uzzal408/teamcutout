@extends('backend.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-cab"></i> {{ $pageTitle }}</h1>
        </div>
    </div>
    @include('backend.partials.flash')
    <div class="row user">
        <div class="col-md-1"></div>
        <div class="col-md-9">
            <div class="tab-content">
                 <div class="tile">
                    <form action="{{ route('admin.counters.update') }}" method="POST" role="form">
                    @csrf
                    <h3 class="tile-title">Portfolio(Counter)</h3>
                    <hr>
                        <div class="tile-body">
                            <div class="form-group">
                                <label class="control-label" for="satisfied_client">Satisfied Client</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        placeholder="Enter Number of total satisfied client"
                                        id="satisfied_client"
                                        name="satisfied_client"
                                        value="{{ config('settings.satisfied_client') }}"
                                    />
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="total_file">Total Completed Files</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        placeholder="Enter number total completed file"
                                        id="total_file"
                                        name="total_file"
                                        value="{{ config('settings.total_file') }}"
                                    />
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="total_project">Total Completed Project</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        placeholder="Enter enter number of total completed project"
                                        id="total_project"
                                        name="total_project"
                                        value="{{ config('settings.total_project') }}"
                                    />
                                </div>
                        </div>
                        <div class="tile-footer">
                            <div class="row d-print-none mt-2">
                                <div class="col-12 text-right">
                                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Portfolio</button>
                                </div>
                            </div>
                        </div>
                    </form>
                 </div>
            </div>
        </div>
    </div>
@endsection
