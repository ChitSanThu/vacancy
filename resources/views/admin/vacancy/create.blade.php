@extends('adminlte::page')

@section('title', 'Vacancy')

@section('content_header')

@stop

@section('content')
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="card mt-3">
                <div class="card-header">
                    <h3>Vacancy Post</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('vacancies.store') }}" id="vacancyForm" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="position">Position <span class="text-danger">*</span></label>
                                    @error('position')
                                        <span class="text-danger small-text ml-2">{{ $message }}</span>
                                    @enderror
                                    <select id="position"  class="form-control"
                                        name="position">
                                        <option value="">Select Position</option>
                                        @foreach ($positions as $id => $position)
                                            <option value="{{ $id }}"
                                                {{ old('position') == $id ? 'selected' : '' }}>
                                                {{ $position }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="">
                                    <label for="file">Cover Image</label>
                                    @error('image')
                                        <span class="text-danger small-text ml-2">{{ $message }}</span>
                                    @enderror
                                    <input type="file" name="image" id="" class="form-control p-1">

                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <label for="description">Job Description<span class="text-danger">*</span></label>
                                @error('description')
                                    <span class="text-danger small-text ml-2">{{ $message }}</span>
                                @enderror
                                <textarea class="summernote" name="description"><div id="description">{{ old('description') }}</div></textarea>
                            </div>
                            <div class="col-12 mt-3">
                                <label for="requirement">Job Requirement<span class="text-danger">*</span></label>
                                @error('requirement')
                                    <span class="text-danger small-text ml-2">{{ $message }}</span>
                                @enderror
                                <textarea id="test" class="summernote" name="requirement"><div id="requirement">{{ old('requirement') }}</div></textarea>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Location<span class="text-danger">*</span></label>

                                    <input list="location" autocomplete="off" name="location" value="{{ old('location') }}" autocomplete="off"
                                        class="form-control">
                                    <datalist id="location" class="w-100">
                                        @foreach ($locations as $name)
                                            <option value="{{$name}}">
                                        @endforeach
                                    </datalist>
                                    @error('location')
                                        <div class="text-danger small-text ml-2">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="requiredEmployee">Required Employee
                                        <span class="text-danger">*</span></label>

                                    <input id="requiredEmployee" autocomplete="off" value="{{ old('required_employee') }}"
                                        class="form-control" type="text" name="required_employee">
                                        @error('required_employee')
                                        <div class="text-danger small-text ml-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 ">
                                <label for="">Job Type <span class="text-danger">*</span></label>
                                <div class="custom-control custom-radio custom-control-inline ">
                                    <input type="radio" checked id="fte" value="fte" name="job_type"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="fte">Full Time</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="pte" name="job_type" value="pte"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="pte">Part Time</label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button class="btn btn-warning" onclick="history.back()" type="button">Cancel</button>
                            <button class="btn btn-primary  ml-3" type="submit">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@section('css')
    <link href="{{ asset('vendor/summernote/summernote.min.css') }}" rel="stylesheet">
    <style>
        .small-text {
            font-size: 0.9em;
        }
    </style>
@stop
@section('js')
    <script src="{{ asset('vendor/summernote/summernote.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 200,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ]
            });
        })
    </script>
@stop
    
