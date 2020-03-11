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
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addGrade">Add Branch</button>
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
                      <h3 class="tile-title">Add Branch</h3>
                      <div class="tile-body">
                      {{-- INSERT FORM --}}
                        <form class="row" action="{{route('add-branch.store')}}" method="post">
                       @csrf
                          <div class="form-group col-md-6" >
                            <label for="Grade">Company</label>
                              <select name="comp_id" class="form-control" id="comp_id" required="" >
                              <option value="" required=""> Select Company</option>
                                @foreach($data as $datas)
                                  <option value="{{$datas->id}}" >{{$datas->company}}</option>
                                @endforeach
                              </select>
                              @error('Company')
                                <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                            <div class="form-group col-md-6" >
                              <label for="Grade">Branch City</label>
                                <input type="text" name="city" id="city" class="form-control">
                                @error('city')
                                  <span class="text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                           </div>
                            <div class="form-group col-md-6" >
                              <label for="Grade">Branch Address</label>
                                <textarea type="text" name="address" id="address" class="form-control"> </textarea> 
                                @error('address')
                                  <span class="text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
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
                          <th>City</th>
                          <th>Branch</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @php $i=1; @endphp
                      {{-- Foreach Loop start --}}
                      @foreach($branch as $datas1)
                    
                        <tr>
                          <td>{{ $i++}}</td>
                          <td>{{ $datas1->company_details->company}}</td>
                          <td>{{ $datas1->city}}</td>
                          <td>{{ $datas1->address}}</td>
                          <td>
                          {{-- Delete form --}}
                       
                            <form method="post" action="{{ route('add-branch.destroy',$datas1->id) }}">
                              @csrf
                              @method('DELETE')
                               {{-- Edit Button with model box call --}}
                                   <button type="button" data-toggle="modal" data-target="#editGrad{{ $datas1->id }}" class="fa fa-pencil-square-o btn btn-primary">
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
                          <div class="modal fade" id="editGrad{{ $datas1->id }}" role="dialog">
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
                                        <h3 class="tile-title">Update Branch</h3>
                                        <div class="tile-body">
                                        {{-- Update FORM --}}
                               
                                          <form class="row" action="{{route('add-branch.update',$datas1->id)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                 
                                            <div class="form-group col-md-6" >
                                                <label for="Grade">Company</label>
                                                  <select name="comp_id" class="form-control" id="comp_id" required="" readonly="">
                                                  <option value="{{$datas1->comp_id}}" required=""> {{$datas1->company_details->company}}</option>
                                                    @foreach($data as $datas)
                                                      <option value="{{$datas->comp_id}}" >{{$datas->company}}</option>
                                                    @endforeach
                                                  </select>
                                                  @error('comp_id')
                                                    <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                  </span>
                                                  @enderror
                                               </div>
                                            <div class="form-group col-md-6" >
                                              <label for="Grade">Branch City</label>
                                                <input type="text" name="city" id="city" class="form-control" value="{{$datas1->city}}">
                                                @error('city')
                                                  <span class="text-danger" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                             </div>
                                              <div class="form-group col-md-6" >
                                              <label for="Grade">Branch Address</label>
                                                <textarea type="text" name="address" id="address" class="form-control" value="{{$datas1->address}}">{{$datas1->address}}</textarea> 
                                                @error('address')
                                                  <span class="text-danger" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
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


