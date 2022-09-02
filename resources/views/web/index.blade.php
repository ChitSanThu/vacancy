@extends('layouts.master')
@section('title', 'Vacancy')
@section('content')
    <div class="container">
        <div class="row d-flex align-content-center">
            <div class="col-12 col-md-6 col-lg-4 d-flex align-items-center">
                <div class="text-center">
                    <h1 class="text-success">We are hiring for several position</h1>
                    <p>Are you ready to join us ?</p>
                    <p class="text-secondary">We are looking for people with a great attitude and a willingness to give it
                        ago. We can offer flexibility and on-the-job training.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 d-flex align-items-center">
                <div class="">
                    <img src="{{ asset('images/get_bak_vacancy.png') }}" width="380px" alt="" srcset="">
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 d-flex align-items-center">
                <div class="card ms-4 bg-info" style="width: 90%;height:400px;overflow-y:scroll;">
                    <p class="text-getbak h5 py-1 mt-3 mx-3 mb-3 bg-success text-center text-white">Most Applied Jobs</p>
                    @foreach ($mostApplyJobs as $job)

                        <div class="card mx-3 mb-3 py-3 px-2">
                            <div class="d-flex align-items-center">
                                <img class=" rounded " src="{{ asset($job->cover_image)}}" width="50" alt="">
                                <p class="ms-3 mb-0">{{ $job->position->name }} <span style="font-size: 0.7rem">{{$job->time_diff}}</span> </p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <hr>
        <h1 class="text-center text-success">We'd Love to Meet You !</h1>
        <div class="row">
            @foreach ($vacancies as $vacancy)
                <div class="col-sm-6 col-lg-3  mt-3">
                    <div class="card no-gutters" style="height: 380px">
                        <div class="d-flex justify-content-between p-3 align-items-center">
                            <img src="{{ asset($vacancy->cover_image)}}" style="width: 50px;height:50px"
                                class=" rounded-circle" alt="">
                            <p class="mb-0 text-uppercase" style="font-size: 0.9rem">{{$vacancy->time_diff}}</p>
                        </div>
                        <h5 class="text-success px-3">{{ $vacancy->position->name }}</h5>
                        <div class="d-flex">
                            <span class="badge rounded-pill text-bg-info text-uppercase mx-3">{{$vacancy->job_type}}</span>
                            <span class="badge rounded-pill text-bg-warning">{{ $vacancy->required_employee }} posts</span>
                            <span class="badge rounded-pill text-bg-danger mx-3">{{ $vacancy->location_id }}</span>
                        </div>
                        <p class="px-3 py-3">{!! Str::limit($vacancy->position->short_description, 160) !!}</p>

                        <div class="mx-3 position-absolute bottom-0 mb-3">
                            <button type="button" class="btn btn-info text-bold px-4 me-0 me-lg-3" data-bs-toggle="modal"
                                data-bs-vacancy="{{ $vacancy->id }}" data-bs-position="{{ $vacancy->position->name }}"
                                data-bs-target="#jobApplyForm">Apply</button>
                            <a href="{{route('job_list.details',$vacancy->id)}}" class="btn btn-secondary px-4 ms-0 ms-lg-3">Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
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
                <form method="post" onsubmit="apply(event)" id="applicationForm" enctype="multipart/form-data">
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
                                    <input id="applyPosition" class="form-control" type="text" disabled>
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
        ::-webkit-scrollbar {
            display: none;
        }
    </style>
@endsection
@section('js')
    <script>
        document.getElementById('jobApplyForm').addEventListener('show.bs.modal', event => {
            const data = event.relatedTarget;
            $('#applicationForm').attr('action', `/job_list/${data.getAttribute('data-bs-vacancy')}/apply`);
            $('#applyPosition').attr('placeholder', data.getAttribute('data-bs-position'));
        })

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
