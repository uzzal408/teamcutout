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
                <form action="{{ route('admin.packages.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="page_id">Select a page<span class="m-l-5 text-danger"> *</span></label>
                            <select name="page_id" class="form-control @error('page_id') is-invalid @enderror" id="page_id">
                                <option>Select a page</option>
                                @foreach($pages as $page)
                                    <option value="{{ $page->id }}" {{ (old('page_id',$t_page->page_id)==$page->id) ? 'selected' : '' }}>{{ $page->title }}</option>
                                @endforeach
                            </select>
                            @error('menu_id')<p style="color: red">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">Name<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name',$t_page->name) }}"/>
                            <input type="hidden" name="id" value="{{ $t_page->id }}">
                            <input type="hidden" name="site_id" value="{{ session()->get('site_id') }}">
                            @error('name')<p style="color: red">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="title">Title <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title',$t_page->title) }}"/>
                            <input type="hidden" name="id" value="{{ $t_page->id }}">
                            <input type="hidden" name="site_id" value="{{ session()->get('site_id') }}">
                            @error('title')<p style="color: red">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="price">Price <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('price') is-invalid @enderror" type="text" name="price" id="price" value="{{ old('price',$t_page->price) }}"/>
                            <input type="hidden" name="id" value="{{ $t_page->id }}">
                            <input type="hidden" name="site_id" value="{{ session()->get('site_id') }}">
                            @error('price')<p style="color: red">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="original_price">Original Price <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('original_price') is-invalid @enderror" type="text" name="original_price" id="original_price" value="{{ old('original_price',$t_page->original_price) }}"/>
                            <input type="hidden" name="id" value="{{ $t_page->id }}">
                            <input type="hidden" name="site_id" value="{{ session()->get('site_id') }}">
                            @error('original_price')<p style="color: red">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="save">Save<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('save') is-invalid @enderror" type="text" name="save" id="save" value="{{ old('save',$t_page->save) }}"/>
                            <input type="hidden" name="id" value="{{ $t_page->id }}">
                            <input type="hidden" name="site_id" value="{{ session()->get('site_id') }}">
                            @error('save')<p style="color: red">{{ $message }}</p> @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="list">List</label><br>
                                    <select name="list_id[]" id="list" class="form-control" multiple>
                                        <option value="">Select a list</option>
                                        @foreach($lists as $list)
                                            @php $check = in_array($list->id, $t_page->lists->pluck('id')->toArray()) ? 'selected' : ''@endphp
                                            <option value="{{ $list->id }}" {{ $check }}>{{ $list->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" id="status" name="status"
                                    {{ (old('status',$t_page->status)) == 1 ? 'checked' : '' }}
                                />Enable
                            </label>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.packages.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

