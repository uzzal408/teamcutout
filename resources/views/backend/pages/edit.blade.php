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
            <form action="{{ route('admin.pages.update') }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                <div class="tile-body">
                    <div class="form-group">
                        <label class="control-label" for="parent_menu">Select Menu<span class="m-l-5 text-danger"> *</span></label>
                        <select name="menu_id" class="form-control @error('menu_id') is-invalid @enderror" id="menu">
                            <option>Select a menu</option>
                            @foreach($menus as $menu)
                            <option value="{{ $menu->id }}" {{ (old('menu_id',$t_page->menu_id)==$menu->id) ? 'selected' : '' }}>{{ $menu->title }}</option>
                            @endforeach
                        </select>
                        @error('menu_id')<p style="color: red">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="title">Title <span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title',$t_page->title) }}" />
                        <input type="hidden" name="id" value="{{ $t_page->id }}">
                        <input type="hidden" name="site_id" value="{{ session()->get('site_id') }}">
                        @error('title')<p style="color: red">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="short_desc">Short Description<span class="m-l-5 text-danger"> *</span></label>
                        <textarea name="short_desc" class="form-control @error('short_desc') is-invalid @enderror" id="short_desc">
                                {!! old('short_desc',$t_page->short_desc) !!}
                            </textarea>
                        <input type="hidden" name="site_id" value="{{ session()->get('site_id') }}">
                        @error('short_desc')<p style="color: red">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="content">Content<span class="m-l-5 text-danger"> *</span></label>
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content">
                                {!! old('content',$t_page->content) !!}
                            </textarea>
                        <input type="hidden" name="site_id" value="{{ session()->get('site_id') }}">
                        @error('short_desc')<p style="color: red">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" id="status" name="status" {{ (old('status',$t_page->status)) == 1 ? 'checked' : '' }} />Enable
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="url">Redirect URL</label>
                        <input class="form-control @error('others') is-invalid @enderror" type="text" value="{{ old('others',$t_page->others) }}" id="url" name="others" />
                        <input type="hidden" name="site_id" value="{{ session()->get('site_id') }}">
                        @error('others') <p style="color: red">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                @if ($t_page->image != null)
                                <figure class="mt-2" style="width: 80px; height: auto;">
                                    <img src="{{ asset('storage/'.$t_page->image) }}" id="image" class="img-fluid" alt="img">
                                </figure>
                                @endif
                            </div>
                            <div class="col-md-10">
                                <label class="control-label">Image [ Width: 640px, Height: 426px; Maximum Size: 70KB]</label>
                                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" />
                                @error('image') {{ $message }} @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tile-footer">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                    &nbsp;&nbsp;&nbsp;
                    <a class="btn btn-secondary" href="{{ route('admin.pages.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
