@extends('layout.main')
@section('content')


<main class="app-content">
  <div class="app-title">
    <div>
          {{-- Message show --}}
          
      <p>
            @if($message = Session::get('success'))
              
        <div class="alert alert-success">
          <p>{{ $message }}</p>
        </div>
            @endif
          
          </p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
        </ul>
      </div>
{{-- =================================== --}}
  {{-- START INSERT MODEL BOX --}}
      
      <div class="container">
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addGrade">Add Grade</button>
        <!-- Modal -->
        <div class="modal fade" id="addGrade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="row">
              <div style="width: 131%;" class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                  <div class="clearix"></div>
                  <div class="col-md-12">
                    <div class="tile">
                      <h3 class="tile-title">Add Grade</h3>
                      <div class="tile-body">
                      {{-- INSERT FORM --}}
                        <form class="row" action="{{route('grade.store')}}" method="post">
                       @csrf
                          <div class="form-group col-md-6">
                            <label class="control-label">Grade</label>
                            <input id="grd" name="grade" class="form-control" type="text" placeholder="Enter Grade">
                            </div>
                            <div class="form-group col-md-4 align-self-end">
                              <button id="addGrade" class="btn btn-primary" type="submit">
                                <i class="fa fa-fw fa-lg fa-check-circle"></i>ADD
                              </button>
                            </div>
                          </form>
                            {{-- END INSERT FORM --}}
                      
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      {{-- END INSERT MODEL BOX --}}

    {{-- ================================ --}}
        <br>
          <div class="row">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="sampleTable">
                      <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Grade</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @php $i=1; @endphp
                      {{-- Foreach Loop start --}}
                      @foreach($data as $datas)
                    
                        <tr>
                          <td>{{ $i++}}</td>
                          <td>{{ $datas->grade}}</td>
                          <td>
                          {{-- Delete form --}}
                       
                            <form method="post" action="{{ route('grade.destroy',$datas->id) }}">
                              @csrf
                              @method('DELETE')
                               {{-- Edit Button with model box call --}}
                                   <button type="button" data-toggle="modal" data-target="#editGrad{{ $datas->id }}" class="fa fa-pencil-square-o btn btn-primary">
                                   {{-- <i  aria-hidden="true" ></i> --}}
                                   </button>
                                    {{-- Delete button --}}
                                   <button class="fa fa-trash btn btn-danger" onclick="return confirm(' you want to delete?');">
                                    {{-- <i  aria-hidden="true"></i> --}}
                                    </button>
                            </form>
                          </td>
                        </tr>
                    {{-- Edit Model Box start ,this model box popup on edit button click --}}
                        <div class="container">
                          <div class="modal fade" id="editGrad{{ $datas->id }}" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="row">
                                <div style="width: 131%;" class="modal-content">
                                  <div class="modal-header">
                                    <button class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"></h4>
                                  </div>
                                  <div class="modal-body">
                                    <div class="clearix"></div>
                                    <div class="col-md-12">
                                      <div class="tile">
                                        <h3 class="tile-title">Update Grade</h3>
                                        <div class="tile-body">
                                        {{-- Update FORM --}}
                               
                                          <form class="row" action="{{route('grade.update',$datas->id)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                 
                                            <div class="form-group col-md-6">
                                              <label class="control-label">Grade</label>
                                              <input value="{{ $datas->grade}}" name="grade" class="form-control" type="text" placeholder="Enter Grade">
                                              </div>
                                              <div class="form-group col-md-4 align-self-end">
                                                <button type="submit" class="btn btn-primary">
                                                  <i class="fa fa-fw fa-lg fa-check-circle"></i>Update
                                                </button>
                                              </div>
                                            </form>
                                              {{-- END Update FORM --}}
                             
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" id="closeEdit" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                    {{-- Edit Model/Update Box End --}}
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </main>
      @endsection('content')


