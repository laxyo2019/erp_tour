@extends('layout.main');
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
			<ul class="app-breadcrumb breadcrumb side">  </ul>
	</div>



	<div class="tile">
	    <div class="row">
          <div class="col-lg-4">
            <div class="bs-component">
              <ul class="list-group">
                <li class="list-group-item"><span class="tag tag-default tag-pill float-xs-right">#</span>Name = Himanshu</li>
                <li class="list-group-item"><span class="tag tag-default tag-pill float-xs-right">#</span>Dapibus ac facilisis in</li>
                <li class="list-group-item"><span class="tag tag-default tag-pill float-xs-right">#</span>Morbi leo risus</li>
              </ul>
            </div>
          </div>
        </div>   
	<div>

</main>
@endsection