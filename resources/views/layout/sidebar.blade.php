 <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">{{ Auth::user()->name }}</p>
          {{-- <p class="app-sidebar__user-designation">Backend Developer</p> --}}
        </div>
      </div>

    {{-- Nabar for admin Admin --}}
      @role('tour_superadmin')
      <ul class="app-menu">
        <li><a class="app-menu__item" href="{{route('home')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
           
     
        <li class="treeview {{ Request::segment(1) == 'company' ? 'is-expanded ' : '' || Request::segment(1) == 'employee' ? 'is-expanded ' : '' || Request::segment(1) == 'department' ? 'is-expanded ' : ''|| Request::segment(1) == 'designation' ? 'is-expanded ' : ''|| Request::segment(1) == 'grade' ? 'is-expanded ' : ''|| Request::segment(1) == 'entitleclass' ? 'is-expanded ' : '' ||  Request::segment(1) == 'tour-rate' ? 'is-expanded ' : '' ||  Request::segment(1) == 'metropolitan-tour-rate' ? 'is-expanded ' : '' ||  Request::segment(1) == 'add-branch' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Master</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{route('company.index')}}"><i class="icon fa fa-circle-o"></i> Company</a></li>
            <li><a class="treeview-item" href="{{route('employee.index')}}"><i class="icon fa fa-circle-o"></i> Employee</a></li>
            <li><a class="treeview-item" href="{{route('department.index')}}"><i class="icon fa fa-circle-o"></i> Department</a></li>
            <li><a class="treeview-item" href="{{route('designation.index')}}"  ><i class="icon fa fa-circle-o"></i> Designation</a></li>
            <li><a class="treeview-item" href="{{route('grade.index')}}"><i class="icon fa fa-circle-o"></i> Grade</a></li>
            <li><a class="treeview-item" href="{{route('entitleclass.index')}}"><i class="icon fa fa-circle-o"></i> EntitleClass</a></li>
            <li><a class="treeview-item" href="{{url('tour-rate')}}"><i class="icon fa fa-circle-o"></i> Tour Rate</a></li>
            <li><a class="treeview-item" href="{{url('metropolitan-tour-rate')}}"><i class="icon fa fa-circle-o"></i> Metropolitan Tour Rate</a></li>
            <li><a class="treeview-item" href="{{route('showrequest')}}"><i class="icon fa fa-circle-o"></i>Requests</a></li>

            <li><a class="treeview-item" href="{{route('add-branch.index')}}"><i class="icon fa fa-circle-o"></i>Add Branch</a></li>
          </ul>
        </li>
            {{-- Role & Permission --}}
        <li class="treeview {{ Request::segment(1) == 'users' ? 'is-expanded ' : '' || Request::segment(1) == 'roles' ? 'is-expanded ' : '' || Request::segment(1) == 'permissions' ? 'is-expanded ' : ''}}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-key"></i><span class="app-menu__label">Role & Permission</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{route('users.index')}}"><i class="icon fa fa-circle-o"></i> Users</a></li>
            <li><a class="treeview-item" href="{{route('roles.index')}}"><i class="icon fa fa-circle-o"></i> Roles</a></li>
            <li><a class="treeview-item" href="{{route('permissions.index')}}"><i class="icon fa fa-circle-o"></i> Permission</a></li>
          </ul>
        </li>

         <li class="treeview {{ Request::segment(1) == 'showrequest' ? 'is-expanded ' : '' ||Request::segment(1) == 'showrequest' ? 'is-expanded ' : '' }}">
            <a class="app-menu__item" href="{{route('showrequest')}}" ><i class="app-menu__icon fa fa-comments-o"></i><span class="app-menu__label">Tour Requests</span>{{-- <i class="treeview-indicator fa fa-angle-right"> --}}</i></a>
             {{--  <ul class="treeview-menu">
                  <li><a class="treeview-item sub-menu__item" href="{{route('showrequest')}}"><i class="icon fa fa-circle-o"></i>Show Requests</a></li>
              </ul> --}}
          </li>

         <li class="treeview {{ Request::segment(1) == 'tour-amount-bill' ? 'is-expanded ' : '' ||Request::segment(1) == 'tour-bill-request' ? 'is-expanded ' : '' }}}}">
            <a class="app-menu__item" href="{{route('tour-bill-request')}}" ><i class="app-menu__icon fa fa-comments-o"></i><span class="app-menu__label">Tour Amount Bill Request</span>{{--<i class="treeview-indicator fa fa-angle-right"> --}}</i></a>
                {{--  <ul class="treeview-menu">
                  <li><a class="treeview-item sub-menu__item" href="{{route('tour-bill-request')}}"><i class="icon fa fa-circle-o"></i>Show Request</a></li>
              </ul> --}}
          </li>
      
        {{-- @endrole --}}
      </ul>
      @endrole

    {{--End  Nabar for admin admin --}}

    {{-- Nabar for admin level1 --}}

   @role('tour_admin')
      
      <ul class="app-menu">
        <li><a class="app-menu__item" href="{{route('home')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
           
      {{-- Nav bar For level socond --}}
        {{-- @role('admin') --}}
        <li class="treeview {{ Request::segment(1) == 'company' ? 'is-expanded ' : '' || Request::segment(1) == 'employee' ? 'is-expanded ' : '' || Request::segment(1) == 'department' ? 'is-expanded ' : ''|| Request::segment(1) == 'designation' ? 'is-expanded ' : ''|| Request::segment(1) == 'grade' ? 'is-expanded ' : ''|| Request::segment(1) == 'entitleclass' ? 'is-expanded ' : ''}}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Master</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{route('company.index')}}"><i class="icon fa fa-circle-o"></i> Company</a></li>
            <li><a class="treeview-item" href="{{route('employee.index')}}"><i class="icon fa fa-circle-o"></i> Employee</a></li>
            <li><a class="treeview-item" href="{{route('department.index')}}"><i class="icon fa fa-circle-o"></i> Department</a></li>
            <li><a class="treeview-item" href="{{route('designation.index')}}"  ><i class="icon fa fa-circle-o"></i> Designation</a></li>
            <li><a class="treeview-item" href="{{route('grade.index')}}"><i class="icon fa fa-circle-o"></i> Grade</a></li>
            <li><a class="treeview-item" href="{{route('entitleclass.index')}}"><i class="icon fa fa-circle-o"></i> EntitleClass</a></li>
            <li><a class="treeview-item" href="{{route('showrequest')}}"><i class="icon fa fa-circle-o"></i>Requests</a></li>
          </ul>
        </li>
       <li class="treeview {{ Request::segment(1) == 'showrequest' ? 'is-expanded ' : '' ||Request::segment(1) == 'showrequest' ? 'is-expanded ' : '' }}">
            <a class="app-menu__item" href="{{route('showrequest')}}" {{-- data-toggle="treeview" --}}><i class="app-menu__icon fa fa-comments-o"></i><span class="app-menu__label">Tour Requests</span>{{-- <i class="treeview-indicator fa fa-angle-right"></i> --}}</a>
              {{-- <ul class="treeview-menu">
                  <li><a class="treeview-item sub-menu__item" href="{{route('showrequest')}}"><i class="icon fa fa-circle-o"></i>Show Requests</a></li>
              </ul> --}}
          </li>
        
        </li>
         <li class="treeview {{ Request::segment(1) == 'tour-amount-bill' ? 'is-expanded ' : '' }}">
            <a class="app-menu__item" href="{{route('tour-bill-request')}}" ><i class="app-menu__icon fa fa-comments-o"></i><span class="app-menu__label">Tour Amount Bill Request</span>{{-- <i class="treeview-indicator fa fa-angle-right"> --}}</i></a>
              <ul class="treeview-menu">
                  {{-- <li><a class="treeview-item sub-menu__item" href="{{route('tour-bill-request')}}"><i class="icon fa fa-circle-o"></i> Request</a></li> --}}
              </ul>
          </li>

      </ul>
      @endrole
    {{-- Nabar for admin level1 --}}


    {{-- Nabar for admin Manager --}}

      @role('tour_manager')
      <ul class="app-menu">
        <li><a class="app-menu__item" href="{{route('home')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
           
      {{-- Masters --}}
        {{-- @role('admin') --}}
        {{-- <li class="treeview {{ Request::segment(1) == 'company' ? 'is-expanded ' : '' || Request::segment(1) == 'employee' ? 'is-expanded ' : '' || Request::segment(1) == 'department' ? 'is-expanded ' : ''|| Request::segment(1) == 'designation' ? 'is-expanded ' : ''|| Request::segment(1) == 'grade' ? 'is-expanded ' : ''|| Request::segment(1) == 'entitleclass' ? 'is-expanded ' : ''}}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Master</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{route('company.index')}}"><i class="icon fa fa-circle-o"></i> Company</a></li>
            <li><a class="treeview-item" href="{{route('employee.index')}}"><i class="icon fa fa-circle-o"></i> Employee</a></li>
            <li><a class="treeview-item" href="{{route('department.index')}}"><i class="icon fa fa-circle-o"></i> Department</a></li>
            <li><a class="treeview-item" href="{{route('designation.index')}}"  ><i class="icon fa fa-circle-o"></i> Designation</a></li>
            <li><a class="treeview-item" href="{{route('grade.index')}}"><i class="icon fa fa-circle-o"></i> Grade</a></li>
            <li><a class="treeview-item" href="{{route('entitleclass.index')}}"><i class="icon fa fa-circle-o"></i> EntitleClass</a></li>
            <li><a class="treeview-item" href="{{route('showrequest')}}"><i class="icon fa fa-circle-o"></i>Requests</a></li>
          </ul>
        </li> --}}

      {{--  <li class="treeview {{ Request::segment(1) == 'TourRequest' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{route('TourRequest.index')}}" ><i class="app-menu__icon fa fa-comments-o"></i><span class="app-menu__label">Request for Tour</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
             <li>
              <a class="treeview-item sub-menu__item" href="{{route('TourRequest.index')}}"><i class="icon fa fa-circle-o"></i> Send Request</a>
            </li>

           
        </ul>--}}
         <li class="treeview {{ Request::segment(1) == 'showrequest' ? 'is-expanded ' : '' ||Request::segment(1) == 'showrequest' ? 'is-expanded ' : '' }}">
            <a class="app-menu__item" href="{{route('showrequest')}}" ><i class="app-menu__icon fa fa-comments-o"></i><span class="app-menu__label">Users Tour Requests</span>{{-- <i class="treeview-indicator fa fa-angle-right"> --}}</i></a>
             {{--  <ul class="treeview-menu">
                  <li><a class="treeview-item sub-menu__item" href="{{route('showrequest')}}"><i class="icon fa fa-circle-o"></i>Show Requests</a></li>
              </ul> --}}
          </li>
        
        </li>
        <li class="treeview {{ Request::segment(1) == 'tour-bill-request' ? 'is-expanded ' : ''||Request::segment(1) == 'tour-bill-request' ? 'is-expanded ' : '' }}">
            <a class="app-menu__item" href="{{route('tour-bill-request')}}" ><i class="app-menu__icon fa fa-comments-o"></i><span class="app-menu__label">Tour Amount Bill Request</span>{{-- <i class="treeview-indicator fa fa-angle-right"></i> --}}</a>
             {{--  <ul class="treeview-menu">
                  <li><a class="treeview-item sub-menu__item" href="{{route('tour-bill-request')}}"><i class="icon fa fa-circle-o"></i> Request</a></li>
              </ul> --}}
          </li>
      </ul>
      @endrole
    {{--End Nabar for admin Manager --}}

    {{-- Nabar for admin user --}}

   @role('tour_user')
      <ul class="app-menu">
        <li><a class="app-menu__item" href="{{route('home')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview {{ Request::segment(1) == 'TourRequest' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{ route('TourRequest.index') }}" {{-- data-toggle="treeview" --}}><i class="app-menu__icon fa fa-comments-o"></i><span class="app-menu__label">Request for Tour</span>{{-- <i class="treeview-indicator fa fa-angle-right"> --}}</i></a>
          {{-- <ul class="treeview-menu">
            <li><a class="treeview-item sub-menu__item" href="{{route('TourRequest.index')}}"><i class="icon fa fa-circle-o"></i> Send Request</a></li>
        </ul> --}}
        </li>

        <li class="treeview {{ Request::segment(1) == 'tour-amount-bill' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{route('tour-amount-bill.index')}}" ><i class="app-menu__icon fa fa-comments-o"></i><span class="app-menu__label">Tour Amount Bill (T.A.)</span>{{-- <i class="treeview-indicator fa fa-angle-right"> --}}</i></a>
          {{-- <ul class="treeview-menu">
            <li><a class="treeview-item sub-menu__item" href="{{route('tour-amount-bill.index')}}"><i class="icon fa fa-circle-o"></i> Send Request</a></li>
        </ul> --}}
        </li>

       {{--   <li class="treeview {{ Request::segment(1) == 'local-ta-bill' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{route('local-tour-amount-bill.index')}}" d><i class="app-menu__icon fa fa-comments-o"></i><span class="app-menu__label">Local T.A. Bill</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu"> --}}
            {{-- <li><a class="treeview-item sub-menu__item" href="{{route('local-tour-amount-bill.index')}}"><i class="icon fa fa-circle-o"></i> Send Request</a></li>
        </ul> --}}
        </li>
      </ul>
      @endrole
    {{-- End  Nabar for admin Manager --}}


    {{-- Nabar for admin Accountant --}}

   @role('tour_accountant')

      <ul class="app-menu">
        <li><a class="app-menu__item" href="{{route('home')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
           
    
       <li class="treeview {{ Request::segment(1) == 'showrequest' ? 'is-expanded ' : '' ||Request::segment(1) == 'showrequest' ? 'is-expanded ' : '' }}">
            <a class="app-menu__item" href="{{route('showrequest')}}" ><i class="app-menu__icon fa fa-comments-o"></i><span class="app-menu__label">Tour Requests</span>{{-- <i class="treeview-indicator fa fa-angle-right"></i> --}}</a>
          
          </li>
        
        </li>
         <li class="treeview {{ Request::segment(1) == 'tour-amount-bill' ? 'is-expanded ' : '' }}">
            <a class="app-menu__item" href="{{route('tour-bill-request')}}" ><i class="app-menu__icon fa fa-comments-o"></i><span class="app-menu__label">Tour Amount Bill Request</span>{{-- <i class="treeview-indicator fa fa-angle-right"> --}}</i></a>
              <ul class="treeview-menu">
                  {{-- <li><a class="treeview-item sub-menu__item" href="{{route('tour-bill-request')}}"><i class="icon fa fa-circle-o"></i> Request</a></li> --}}
              </ul>
          </li>

      </ul>
      @endrole
    {{-- Nabar for admin Accountant --}}
    </aside>
  
