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
                <form action="{{ route('admin.menus.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="parent_menu">Select Parent Menu<span class="m-l-5 text-danger"> *</span></label>
                            <select name="parent_id" class="form-control @error('parent_id') is-invalid @enderror" id="menu">
                                <option>Select Parent Menu</option>
                                @foreach($menus as $menu)
                                <option value="{{ $menu->id }}" {{ (old('parent_id')==$menu->id) ? 'selected' : '' }}>{{ $menu->title }}</option>
                                @endforeach
                            </select>
                            @error('parent_id')<p style="color: red">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="title">Title <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') }}"/>
                            <input type="hidden" name="site_id" value="{{ session()->get('site_id') }}">
                            @error('title')<p style="color: red">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="sorting">Sorting<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('sorting') is-invalid @enderror" type="text" name="sorting" id="sorting" value="{{ old('sorting') }}"/>
                            <input type="hidden" name="site_id" value="{{ session()->get('site_id') }}">
                            @error('sorting')<p style="color: red">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" id="in_home_page" name="in_home_page"/>Show in menu
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" id="status" name="status"/>Enable
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Image</label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"/>
                            <input type="hidden" name="site_id" value="{{ session()->get('site_id') }}">
                            @error('image') <p style="color: red">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.menus.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

