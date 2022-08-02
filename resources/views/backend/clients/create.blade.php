@extends('backend.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            <p>{{ $pageSubTitle }}</p>
        </div>
    </div>
    @include('backend.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{ $pageSubTitle }}</h3>
                <form action="{{ route('admin.clients.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Name<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}" />
                            <input type="hidden" name="site_id" value="{{ session()->get('site_id') }}">
                            @error('name')<p style="color: red">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">Client Site URL<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('url') is-invalid @enderror" type="text" name="url" id="url" value="{{ old('url') }}" />
                            <input type="hidden" name="site_id" value="{{ session()->get('site_id') }}">
                            @error('url')<p style="color: red">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" id="status" name="status" />Enable
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" id="dropzone">
                                <div>Image [ Width: 356px, Height: 203px; Maximum 10KB ]</div>
                                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"/>
                                @error('image') {{ $message }} @enderror
                            </div>
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label class="control-label">Image [ Width: 356px, Height: 203px; File Size: Maximum 10KB; ]</label>--}}
{{--                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" />--}}
{{--                            <input type="hidden" name="site_id" value="{{ session()->get('site_id') }}">--}}
{{--                            @error('image') <p style="color: red">{{ $message }}</p> @enderror--}}
{{--                        </div>--}}
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.clients.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    @endsection
