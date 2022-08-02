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
                <form action="{{ route('admin.healthpackage-page.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="menu_id">Select Menu<span class="m-l-5 text-danger"> *</span></label>
                            <select name="menu_id" class="form-control @error('menu_id') is-invalid @enderror" id="menu">
                                <option>Select a Menu</option>
                                @foreach($menus as $menu)
                                    <option value="{{ $menu->id }}" {{ (old('menu_id')==$menu->id) ? 'selected' : '' }}>{{ $menu->title }}</option>
                                @endforeach
                            </select>
                            @error('menu_id')<p style="color: red">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="title">Title <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') }}"/>
                            <input type="hidden" name="site_id" value="{{ session()->get('site_id') }}">
                            @error('title')<p style="color: red">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="short_desc">Short Description<span class="m-l-5 text-danger"> *</span></label>
                            <textarea name="short_desc" class="form-control @error('short_desc') is-invalid @enderror" id="short_desc">
                                {!! old('short_desc') !!}
                            </textarea>
                            <input type="hidden" name="site_id" value="{{ session()->get('site_id') }}">
                            @error('short_desc')<p style="color: red">{{ $message }}</p> @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="list">List</label><br>
                                    <select name="list_id[]" id="list" class="form-control" multiple>
                                        <option value="">Select a list</option>
                                        @foreach($lists as $list)
                                            <option value="{{ $list->id }}">{{ $list->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" id="status" name="status"/>Enable
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.healthpackage-page.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

