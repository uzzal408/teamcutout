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
            <form action="{{ route('admin.sites.update') }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                <div class="tile-body">
                    <div class="form-group">
                        <label class="control-label" for="title">Name<span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name',$t_site->name) }}" />
                        <input type="hidden" name="id" value="{{ $t_site->id }}">
                        @error('name')<p style="color: red">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="title">Title <span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title',$t_site->title) }}" />
                        <input type="hidden" name="id" value="{{ $t_site->id }}">
                        @error('title')<p style="color: red">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="url">URL<span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control @error('url') is-invalid @enderror" type="text" name="url" id="url" value="{{ old('url',$t_site->url) }}" />
                        <input type="hidden" name="id" value="{{ $t_site->id }}">
                        @error('url')<p style="color: red">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="url">Sorting<span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control @error('sorting') is-invalid @enderror" type="text" name="sorting" id="sorting" value="{{ old('sorting',$t_site->sorting) }}" />
                        <input type="hidden" name="id" value="{{ $t_site->id }}">
                        @error('sorting')<p style="color: red">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" id="status" name="status" {{ (old('status',$t_site->status)) == 1 ? 'checked' : '' }} />Enable
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                @if ($t_site->image != null)
                                <figure class="mt-2" style="width: 80px; height: auto;">
                                    <img src="{{ asset('storage/'.$t_site->image) }}" id="image" class="img-fluid" alt="img">
                                </figure>
                                @endif
                            </div>
                            <div class="col-md-10">
                                <label class="control-label">Image [Width: 356px, Height: 203px; File Size: Maximum 10 KB]</label>
                                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" />
                                @error('image') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tile-footer">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
                    &nbsp;&nbsp;&nbsp;
                    <a class="btn btn-secondary" href="{{ route('admin.sites.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
