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
                <form action="{{ route('admin.menus.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="parent_menu">Select Parent Menu<span class="m-l-5 text-danger"> *</span></label>
                            <select name="parent_id" class="form-control @error('parent_id') is-invalid @enderror" id="menu">
                                <option>Select Parent Menu</option>
                                @foreach($menus as $menu)
                                    <option value="{{ $menu->id }}" {{ (old('parent_id',$t_menu->parent_id)==$menu->id) ? 'selected' : '' }}>{{ $menu->title }}</option>
                                @endforeach
                            </select>
                            @error('parent_id')<p style="color: red">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="title">Title <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title',$t_menu->title) }}"/>
                            <input type="hidden" name="id" value="{{ $t_menu->id }}">
                            <input type="hidden" name="site_id" value="{{ session()->get('site_id') }}">
                            @error('title')<p style="color: red">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="sorting">Sorting<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('sorting') is-invalid @enderror" type="text" name="sorting" id="sorting" value="{{ old('sorting',$t_menu->sorting) }}"/>
                            <input type="hidden" name="id" value="{{ $t_menu->id }}">
                            <input type="hidden" name="site_id" value="{{ session()->get('site_id') }}">
                            @error('sorting')<p style="color: red">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" id="in_home_page" name="in_home_page"
                                        {{ (old('in_home_page',$t_menu->in_home_page)) == 1 ? 'checked' : '' }}
                                    />Show in home page
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" id="status" name="status"
                                        {{ (old('status',$t_menu->status)) == 1 ? 'checked' : '' }}
                                    />Enable
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    @if ($t_menu->image != null)
                                        <figure class="mt-2" style="width: 80px; height: auto;">
                                            <img src="{{ asset('storage/'.$t_menu->image) }}" id="image" class="img-fluid" alt="img">
                                        </figure>
                                    @endif
                                </div>
                                <div class="col-md-10">
                                    <label class="control-label">Image</label>
                                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"/>
                                    @error('image') {{ $message }} @enderror
                                </div>
                            </div>
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

