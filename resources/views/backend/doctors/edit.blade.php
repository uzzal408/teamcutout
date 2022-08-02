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
            <form action="{{ route('admin.doctors.update') }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                <div class="tile-body">
                    <div class="form-group">
                        <label class="control-label" for="parent_menu">Select a Department<span class="m-l-5 text-danger"> *</span></label>
                        <select name="page_id" class="form-control @error('page_id') is-invalid @enderror">
                            <option>Select a Departments</option>
                            @foreach($pages as $page)
                            <option value="{{ $page->id }}" {{ (old('page_id',$t_doctor->page_id)==$page->id) ? 'selected' : '' }}>{{ $page->title }}</option>
                            @endforeach
                        </select>
                        @error('page_id')<p style="color: red">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="name">Name<span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name',$t_doctor->name) }}" />
                        <input type="hidden" name="id" value="{{ $t_doctor->id }}">
                        <input type="hidden" name="site_id" value="{{ session()->get('site_id') }}">
                        @error('name')<p style="color: red">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="doctor_unique_id">Doctor Unique Id<span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control @error('doctor_unique_id') is-invalid @enderror" type="text" name="doctor_unique_id" id="doctor_unique_id" value="{{ old('doctor_unique_id',$t_doctor->doctor_unique_id) }}" />
                        <input type="hidden" name="site_id" value="{{ session()->get('site_id') }}">
                        @error('doctor_unique_id')<p style="color: red">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="designation">Designation<span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control @error('designation') is-invalid @enderror" type="text" name="designation" id="designation" value="{{ old('designation',$t_doctor->designation) }}" />
                        <input type="hidden" name="site_id" value="{{ session()->get('site_id') }}">
                        @error('designation')<p style="color: red">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="available_time">Available Time<span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control @error('available_time') is-invalid @enderror" type="text" name="available_time" id="available_time" value="{{ old('available_time',$t_doctor->available_time) }}" />
                        <input type="hidden" name="site_id" value="{{ session()->get('site_id') }}">
                        @error('available_time')<p style="color: red">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="speciality">Speciality<span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control @error('speciality') is-invalid @enderror" type="text" name="speciality" id="speciality" value="{{ old('speciality',$t_doctor->speciality) }}" />
                        <input type="hidden" name="site_id" value="{{ session()->get('site_id') }}">
                        @error('speciality')<p style="color: red">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="details">Details<span class="m-l-5 text-danger"> *</span></label>
                        <textarea class="form-control @error('details') is-invalid @enderror" type="text" name="details" id="details">
                                {!! old('details',$t_doctor->details) !!}
                            </textarea>
                        <input type="hidden" name="site_id" value="{{ session()->get('site_id') }}">
                        @error('details')<p style="color: red">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" id="status" name="status" {{ (old('status',$t_doctor->status)) == 1 ? 'checked' : '' }} />Enable
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="days">
                            <h3 class="tile-title">Select Day</h3>
                            {{-- <button type="button" class="btn btn-sm btn-primary" id="selectAllDays">Select All</button>--}}
                            <div class="form-control all-fc">
                                <label for="day_one">SUNDAY</label>
                                <input type="checkbox" id="day_one" name="days[]" value="0" {{ (in_array('0',$selected_day))?'checked':'' }}>
                                <label for="day_two">MONDAY</label>
                                <input type="checkbox" id="day_two" name="days[]" value="1" {{ (in_array('1',$selected_day))?'checked':'' }}>
                                <label for="day_three">TUESDAY</label>
                                <input type="checkbox" id="day_three" name="days[]" value="2" {{ (in_array('2',$selected_day))?'checked':'' }}>
                                <label for="day_four">WEDNESDAY</label>
                                <input type="checkbox" id="day_four" name="days[]" value="3" {{ (in_array('3',$selected_day))?'checked':'' }}>
                                <label for="day_five">THURSDAY</label>
                                <input type="checkbox" id="day_five" name="days[]" value="4" {{ (in_array('4',$selected_day))?'checked':'' }}>
                                <label for="day_six">FRIDAY</label>
                                <input type="checkbox" id="day_six" name="days[]" value="5" {{ (in_array('5',$selected_day))?'checked':'' }}>
                                <label for="day_seven">SATURDAY</label>
                                <input type="checkbox" id="day_seven" name="days[]" value="6" {{ (in_array('6',$selected_day))?'checked':'' }}>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="row">
                            <div class="col-md-12" id="dropzone">
                                <div>Image [Width: 370px, height: 470px; File Size: Maximum 35 KB]</div>
                                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"/>
                                @error('image') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                @if ($t_doctor->image != null)
                                <figure class="mt-2" style="width: 80px; height: auto;">
                                    <img src="{{ asset('storage/'.$t_doctor->image) }}" id="image" class="img-fluid" alt="img">
                                </figure>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tile-footer">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                    &nbsp;&nbsp;&nbsp;
                    <a class="btn btn-secondary" href="{{ route('admin.doctors.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
