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
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addComapny">Add Company</button>
        <!-- Modal -->
        <div class="modal fade" id="addComapny" role="dialog">
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
                      <h3 class="tile-title">Add Company</h3>
                      <div class="tile-body">
                      {{-- INSERT FORM --}}
                        <form class="row" action="{{route('company.store')}}" method="post">
                        @csrf
                          <div class="form-group col-md-6">
                            <label class="control-label">Company</label>
                            <input id="grd" name="company" class="form-control" type="text" placeholder="Enter Company">
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
                          <th>Company</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php $i=1; @endphp
                        {{-- Foreach Loop start --}}
                          @foreach($data as $datas)
                        <tr>
                          <td>{{ $i++}}</td>
                          <td>{{ $datas->company}}</td>
                          <td>
                          {{-- Delete form --}}
                            <form method="post" action="{{ route('company.destroy',$datas->id) }}">
                                @csrf
                                @method('DELETE')
                                {{-- Edit Button with model box call --}}
                          
                              <button type="button" data-toggle="modal" data-target="#companyEdit{{ $datas->id }}" class="fa fa-pencil-square-o btn btn-primary">
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
                          <div class="modal fade" id="companyEdit{{ $datas->id }}" role="dialog">
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
                                        <h3 class="tile-title">Update Company</h3>
                                        <div class="tile-body">
                                        {{-- Update FORM --}}
                                          <form class="row" action="{{route('company.update',$datas->id)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group col-md-6">
                                              <label class="control-label">Company</label>
                                              <input value="{{ $datas->company}}" name="company" class="form-control" type="text" placeholder="Enter Company">
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


