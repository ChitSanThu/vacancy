@extends('adminlte::page')

@section('title', 'Positions')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3>Positions</h3>

                            <a href="{{route('positions.create')}}" type="button" class="btn btn-primary">Create Position</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Position</th>
                                  <th scope="col">Short Descriptioin</th>
                                  <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($positions as $index=>$position)
                                    <tr>
                                        <td>{{++$index}}</td>
                                        <td>{{$position->name}}</td>
                                        <td>{{$position->short_description}}</td>
                                        <td>
                                            <div class="d-flex justify-content-around">
                                                <button class="btn btn-sm btn-success"  data-toggle="modal" data-target="#showPosition" data-id="{{$position->id}}"><i class="fas fa-eye"></i></button>
                                                {{-- <a href="" class="btn btn-sm btn-warning mx-3"><i class="far fa-edit"></i></a>
                                                <form action="" method="post">
                                                    @method("DELETE")
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                                </form> --}}
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
    <div class="modal fade" id="showPosition" tabindex="-1" aria-labelledby="showPositionLabel" aria-hidden="true">
        <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="showPositionLabel"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="">
                <label for="">Short Descriptoin</label>
                <div class="" id="shortDescription"></div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
@stop

@section('css')
@stop

@section('js')
<script>
    $('#showPosition').on('show.bs.modal', function (event) {
        var positionId = $(event.relatedTarget).data('id')
        var modal = $(this)

        $.ajax({
            method:'GET',
            url:`/admin/positions/${positionId}/json`,
            success:function(position){
                modal.find('#showPositionLabel').text(position.name)
                modal.find('#shortDescription').text(position.short_description)
                modal.find('#jobDescription').html(position.description)
                modal.find('#jobRequirement').html(position.requirement)
            }
        })

    })
</script>
@stop
