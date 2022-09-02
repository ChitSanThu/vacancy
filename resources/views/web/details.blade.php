@extends('layouts.master')

@section('title', 'Job Details')
@section('content')
    <div class="row">
        <div class="col-12">
            <img src="{{ asset('images/vacancy-cover.png') }}" class="w-100" style="object-fit: cover" height="180px"
                alt="">
        </div>
    </div>
    <div class="container">
        <img src="{{ asset($vacancy->cover_image)}}" class="profile" alt="">
        <div class="row mt-3">
            <div class="col-md-8 ">
                <h1 class="mt-5">{{ $vacancy->position->name ?? '' }}</h1>
                <div class="d-flex">
                    <h5>
                        <span class="badge bg-info">
                            <i class="far fa-calendar-alt pe-2"></i>{{ $vacancy->job_type }}
                        </span>
                    </h5>
                    <h5 class="px-3">
                        <span class="badge bg-warning">
                            <i class="fas fa-map-marker-alt pe-2"></i>{{ $vacancy->location->name ?? '' }}
                        </span>
                    </h5>
                    <h5>
                        <span class="badge bg-danger">
                            <i class="fas fa-share-alt pe-2"></i>{{ $vacancy->required_employee }} post
                        </span>
                    </h5>
                </div>
                <h1 class="mt-5">Job Description</h1>
                <div class="">
                    {!! $vacancy->description !!}
                </div>
                <h1 class="mt-3">Skills and experience</h1>
                <div class="">
                    {!! $vacancy->requirements !!}
                </div>

            </div>
            <div class="col-md-4">
                <div class="card mt-5">
                    <div class="card-header bg-success text-white text-center">
                        <h4>Get Daily Jobs Alert</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <input type="email" placeholder="Enter your email address..." class="form-control">
                            <p class="mt-5 text-muted">By subscribing, I agreed to the Getbak <span
                                    class="text-success">Terms of use</span> and acknowledge I have read <span
                                    class="text-success"> Privacy Policy </span> and agree to receive email job alerts.</p>
                            <div class="text-center">

                                <button type="submit" class="btn btn-primary text-uppercase">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            <button type="button" class="btn btn-primary text-bold px-4" data-bs-toggle="modal" data-bs-target="#jobApplyForm">Apply</button>
        </div>
    </div>
    <!--Apply Form Modal -->
    <div class="modal fade" id="jobApplyForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="jobApplyFormLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info my-0 py-0">
                    <div class="modal-title" id="jobApplyFormLabel">
                        <img src="{{ asset('images/gb-logo-white.png') }}" height="40px" alt="">
                    </div>
                    <h6 class="text-white">Applicant Form</h6>
                </div>
                <form method="post" action="{{route('job_list.apply',$vacancy->id)}}" onsubmit="apply(event)" id="applicationForm" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="">
                                    <label for="name" class="form-label">Name <span style="font-size: 0.8rem"
                                            class="text-danger error" id="nameError"></span> </label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label for="email" class="form-label">Email <span style="font-size: 0.8rem"
                                            class="text-danger error" id="emailError"></span></label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="name@example.com">
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-md-6">
                                <div class="">
                                    <label for="birthday" class="form-label">Birthdate <span style="font-size: 0.8rem"
                                            class="text-danger error" id="birthdayError"></span></label>
                                    <input type="date" name="birthday" class="form-control" id="birthday">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label for="phone" class="form-label">Phone <span style="font-size: 0.8rem"
                                            class="text-danger error" id="phoneError"></span></label>
                                    <input type="text" name="phone" class="form-control" id="phone"
                                        placeholder="Phone">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="">
                                    <label for="address" class="form-label">Address <span style="font-size: 0.8rem"
                                            class="text-danger error" id="addressError"></span></label>
                                    <input type="text" name="address" class="form-control" id="address"
                                        placeholder="Address">
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-12">
                                <div>
                                    <label for="applyPosition" class="form-label">Applied Position</label>
                                    <input id="applyPosition" placeholder="{{$vacancy->position->name??""}}" class="form-control" type="text" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <label for="image" class="form-label">Upload Your image <span
                                            style="font-size: 0.8rem" class="text-danger error"
                                            id="imageError"></span></label>
                                    <input class="form-control" name="image" type="file" id="image">
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-12">
                                <div>
                                    <label for="resume" class="form-label">Upload Your Resume <span
                                            class="text-warning">(PDF File Only)</span> <span style="font-size: 0.8rem"
                                            class="text-danger error" id="resumeError"></span></label>
                                    <input class="form-control" name="resume" type="file" id="resume">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Apply</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Success message Modal -->
    <div class="modal fade" id="successAlert" tabindex="-1" aria-labelledby="successAlertLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white text-center">
                    <h5 class="modal-title " id="successAlertLabel">Successfully Alert</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        Your application has applied successfully.
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('css')
    <style>
        .profile {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 20px;
            position: absolute;
            top: 200px;
        }
    </style>
@endsection
@section('js')
    <script>
        function apply(event) {
            event.preventDefault()

            $('.error').each(function(index) {
                $(this).text('')
            })
            let image = $('#image')[0].files[0];
            let resume = $('#resume')[0].files[0];

            let formData = new FormData();
            formData.append('name', $('#name').val())
            formData.append('email', $('#email').val())
            formData.append('birthday', $('#birthday').val())
            formData.append('phone', $('#phone').val())
            formData.append('address', $('#address').val())
            formData.append('image', image)
            formData.append('resume', resume)
            formData.append('_token', `{{ csrf_token() }}`)
            $.ajax({
                method: 'POST',
                url: `${$('#applicationForm').attr('action')}`,
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    console.log(response)
                    if (response.status != 200) {
                        $.each(Object.keys(response.errors), function(index, err) {
                            $(`#${err}Error`).text(response.errors[err])
                        })
                    } else {
                        bootstrap.Modal.getOrCreateInstance(document.getElementById('jobApplyForm')).hide();
                        bootstrap.Modal.getOrCreateInstance(document.getElementById('successAlert')).show();
                    }
                }
            })
        }
    </script>
@endsection
