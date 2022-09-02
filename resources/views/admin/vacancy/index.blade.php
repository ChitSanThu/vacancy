@extends('adminlte::page')

@section('title', 'Vacancy')

@section('content_header')

@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3>Vacancy</h3>

                            <a href="{{route('vacancies.create')}}" type="button" class="btn btn-primary">Create Vacancy</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class=" thead-light">
                                <th>#</th>
                                <th>Position</th>
                                <th>Cover</th>
                                <th>Location</th>
                                <th>Job Type</th>
                                <th>Hire/Required</th>
                                <th>Apply</th>
                                <th>Active</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($vacancies as $index=>$vacancy)
                                    <tr>
                                        <td>{{++$index}}</td>
                                        <td>{{$vacancy->position->name??""}}</td>
                                        <td>
                                            <img src="{{ asset($vacancy->cover_image)}}" height="100" alt="">
                                        </td>
                                        <td>{{$vacancy->location->name??""}}</td>
                                        <td>
                                            <span class=" badge badge-pill badge-info">{{$vacancy->job_type}}</span>
                                        </td>
                                        <td>{{$vacancy->hire_count}} / {{$vacancy->required_employee}}
                                        </td>
                                        <td>{{$vacancy->applyer_count}}</td>
                                        <td>
                                            @if ($vacancy->hire_count<$vacancy->required_employee)

                                            <input type="checkbox" name="is_active" {{$vacancy->is_active ? "checked" : "" }} value="{{$vacancy->id}}" data-toggle="toggle">
                                            @endif
                                        </td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script>
    $('input[name=is_active]').change(function(){
        let vacancyId = $(this).val()
        confirm("Are you sure update !") && $.ajax({
            method:'POST',
            url:`/admin/vacancies/${vacancyId}/change_status`,
            data:{
                _token:`{{csrf_token()}}`
            },
            success:function(response){

            }
        })
    })
</script>
@stop
