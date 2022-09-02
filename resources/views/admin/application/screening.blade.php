@extends('adminlte::page')

@section('title', 'Applications Form - ')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3>Screenig List</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <form action="" id="filter" method="get">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="applyPosition">Position</label>
                                                <select class="form-control" onchange="$('#filter').submit()" name="applyPosition" id="applyPosition">
                                                  <option value="">Select Position</option>
                                                  @foreach ($positions as $id=>$position)
                                                    <option value="{{$id}}" {{request('applyPosition')==$id?'selected':''}}>{{$position}}</option>
                                                  @endforeach

                                                </select>
                                              </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" value="{{request('name')}}" class="form-control" id="name" placeholder="Enter name">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" name="email" value="{{request('email')}}" class="form-control" id="email" placeholder="Enter email">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input type="text" name="phone" value="{{request('phone')}}" class="form-control" id="phone" placeholder="Enter phone">
                                            </div>
                                        </div>

                                    </div>
                                    <input type="submit" hidden />
                                </form>
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Applied Position</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Birth Date</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($applications as $index => $application)
                                            <tr>
                                                <td>{{ ++$index }}</td>
                                                <td>{{ $application->position->name ?? '' }}</td>
                                                <td>{{ $application->name }}</td>
                                                <td>{{ $application->email }}</td>
                                                <td>{{ $application->phone }}</td>
                                                <td>{{ $application->birthday }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-around">
                                                        <button class="btn btn-sm btn-success" data-toggle="modal"
                                                            data-target="#cvDetail" data-id="{{ $application->id }}"><i
                                                                class="fas fa-eye"></i></button>
                                                        <a data-action="{{ route('applications.change_status', ['applicant' => $application->id, 'status' => config('vacancy.application.interview')]) }}"
                                                            data-toggle="modal" data-target="#interviewForm"
                                                            class="btn btn-sm btn-primary mx-3">Interview</a>

                                                        <a href="{{ route('applications.change_status', ['applicant' => $application->id, 'status' => config('vacancy.application.reject')]) }}"
                                                            class="btn btn-sm btn-danger ">Reject</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CV Detail -->
    <div class="modal fade" id="cvDetail" tabindex="-1" aria-labelledby="cvDetailLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cvDetailLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center" id="image">

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-md-6">
                            <div class="">
                                <label for="birthday" class="form-label">Birthdate</label>
                                <input type="text" class="form-control" id="birthday" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" disabled>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-12">
                            <div>
                                <label for="">Resume </label>
                                <a href="" target="_blank" id="resume" rel="noopener noreferrer"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Interview Modal -->
    <div class="modal fade" id="interviewForm" tabindex="-1" aria-labelledby="interviewFormLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="interviewFormLabel">Interview Invitation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" id="invitationForm" method="get">

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="interviewDate" class="form-label">Interview Date</label>
                                    <input type="date" required class="form-control" name="interview" id="interviewDate">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="from" class="form-label">From</label>
                                    <input type="time" required class="form-control" name="from" id="from">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="to" class="form-label">To</label>
                                    <input type="time" required class="form-control" name="to" id="to">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Invite</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
    <script>
        $('#cvDetail').on('show.bs.modal', function(event) {
            var id = $(event.relatedTarget).data('id')
            var modal = $(this)

            $.ajax({
                method: 'GET',
                url: `/admin/applications/${id}`,
                success: function(response) {
                    let application = response.data
                    modal.find('#cvDetailLabel').text(application.position)
                    modal.find('#name').val(application.name)
                    modal.find('#email').val(application.email)
                    modal.find('#phone').val(application.phone)
                    modal.find('#birthday').val(application.birthday)
                    modal.find('#address').val(application.address)
                    modal.find('#image').html(
                        `<img src="${application.image}" height="150" class=" img-rounded" >`)
                    modal.find('#resume').attr('href', application.resume)
                    modal.find('#resume').text(application.resumeFileName)
                }
            })

        })
        $('#interviewForm').on('show.bs.modal', function(event) {
            var action = $(event.relatedTarget).data('action')
            var modal = $(this)
            modal.find('#invitationForm').attr('action',action)

        })
    </script>
@stop
