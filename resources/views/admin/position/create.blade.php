@extends('adminlte::page')

@section('title', 'Vacancy')

@section('content_header')

@stop

@section('content')
<div class="row">
    <div class="col-md-8 offset-2">
        <div class="card mt-3">
            <div class="card-header">
                <h3>Position Create Form</h3>
            </div>
            <div class="card-body">
                <form action="{{route('positions.store')}}" id="vacancyForm" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="position">Position Name<span class="text-danger">*</span></label>
                                @error('name')
                                    <span class="text-danger small-text ml-2">{{$message}}</span>
                                @enderror
                                <input id="position" value="{{old('name')}}"  class="form-control" type="text" name="name">
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="description">Short Description<span class="text-danger">*</span></label>
                            @error('short_description')
                                    <span class="text-danger small-text ml-2">{{$message}}</span>
                            @enderror

                            <textarea class="form-control" rows="3" name="short_description">
                                    {{old('short_description')}}
                            </textarea>
                        </div>

                    </div>

                    <div class="d-flex justify-content-end mt-3">
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
    <link href="{{asset('vendor/summernote/summernote.min.css')}}" rel="stylesheet">
    <style>
        .small-text{
            font-size: 0.9em;
        }
    </style>
@stop
@section('js')
@stop
