 <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
       {{--  <img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image"> --}}
        <div>
          <p >{{ Auth::user()->name }}</p>
{{-- class="app-sidebar__user-name" --}}
        </div>
      </div>

    {{-- Nabar for admin Admin --}}
      {{-- @role('tour_superadmin') --}}
           
      @role('tour_superadmin')

      <ul class="app-menu">
        <li><a class="app-menu__item" href="{{route('home')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard (Super Admin)</span></a></li>

        <li class="treeview {{ Request::segment(1) == 'company' ? 'is-expanded ' : '' || Request::segment(1) == 'employee' ? 'is-expanded ' : '' || Request::segment(1) == 'department' ? 'is-expanded ' : ''|| Request::segment(1) == 'designation' ? 'is-expanded ' : ''|| Request::segment(1) == 'grade' ? 'is-expanded ' : ''|| Request::segment(1) == 'entitleclass' ? 'is-expanded ' : '' ||  Request::segment(1) == 'tour-rate' ? 'is-expanded ' : '' ||  
          Request::segment(1) == 'metropolitan-tour-rate' ? 'is-expanded ' : ''  ||  Request::segment(1) == 'add-branch' ? 'is-expanded ' : '' ||  Request::segment(1) == 'tour-travel-category' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Master</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
           {{--  <li><a class="treeview-item" href="{{route('company.index')}}"><i class="icon fa fa-circle-o"></i> Company</a></li>
            <li><a class="treeview-item" href="{{route('employee.index')}}"><i class="icon fa fa-circle-o"></i> Employee</a></li>
            <li><a class="treeview-item" href="{{route('department.index')}}"><i class="icon fa fa-circle-o"></i> Department</a></li>
            <li><a class="treeview-item" href="{{route('designation.index')}}"  ><i class="icon fa fa-circle-o"></i> Designation</a></li>
            <li><a class="treeview-item" href="{{route('grade.index')}}"><i class="icon fa fa-circle-o"></i> Grade</a></li>
            <li><a class="treeview-item" href="{{route('entitleclass.index')}}"><i class="icon fa fa-circle-o"></i> EntitleClass</a></li> --}}
            <li><a class="treeview-item" href="{{url('tour-rate')}}"><i class="icon fa fa-circle-o"></i> Tour Rate</a></li>
            <li><a class="treeview-item" href="{{url('metropolitan-tour-rate')}}"><i class="icon fa fa-circle-o"></i> Metropolitan Tour Rate</a></li>
            
            <li><a class="treeview-item" href="{{route('showrequest')}}"><i class="icon fa fa-circle-o"></i>
            Users Tour Requests</a></li>

           {{--  <li><a class="treeview-item" href="{{url('tour-policies')}}"><i class="icon fa fa-circle-o"></i>Tour Eligibility and Policies</a></li> --}}

            <li><a class="treeview-item" href="{{url('tour-travel-category')}}"><i class="icon fa fa-circle-o"></i>Tour Travel Categories</a></li>

            {{-- <li><a class="treeview-item" href="{{route('add-branch.index')}}"><i class="icon fa fa-circle-o"></i>Add Branch</a></li> --}}
          </ul>
        </li>
         <li><a class="treeview-item {{Request::segment(1) == 'tour-policies' ? 'is-expanded ' : ''}}" href="{{url('tour-policies')}}"><i class="icon fa fa-user-secret"></i>Tour Travel and Policies</a></li>
            {{-- Role & Permission --}}
        {{-- <li class="treeview {{ Request::segment(1) == 'users' ? 'is-expanded ' : '' || Request::segment(1) == 'roles' ? 'is-expanded ' : '' || Request::segment(1) == 'permissions' ? 'is-expanded ' : ''}}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-key"></i><span class="app-menu__label">Role & Permission</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{route('users.index')}}"><i class="icon fa fa-circle-o"></i> Users</a></li>
            <li><a class="treeview-item" href="{{route('roles.index')}}"><i class="icon fa fa-circle-o"></i> Roles</a></li>
            <li><a class="treeview-item" href="{{route('permissions.index')}}"><i class="icon fa fa-circle-o"></i> Permission</a></li>
          </ul>
        </li> --}}
        {{-- @endrole --}}
         {{-- <li class="treeview {{ Request::segment(1) == 'showrequest' ? 'is-expanded ' : '' ||Request::segment(1) == 'showrequest' ? 'is-expanded ' : '' }}">
            <a class="app-menu__item" href="{{route('showrequest')}}" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Users Tour Requests</span></i></a>
          </li>

         <li class="treeview {{ Request::segment(1) == 'tour-amount-bill' ? 'is-expanded ' : '' ||Request::segment(1) == 'tour-bill-request' ? 'is-expanded ' : '' }}}}">
            <a class="app-menu__item" href="{{route('tour-bill-request')}}" ><i class="app-menu__icon fa fa-files-o"></i><span class="app-menu__label">Users (T.A.) Bill Requests</span></i></a>
          </li> --}}
           <li class="treeview {{ Request::segment(1) == 'showrequest' ? 'is-expanded ' : '' ||  Request::segment(1) == 'show-tour-upg-bill-of-manager' ? 'is-expanded ' : ''  ||  Request::segment(1) == 'level-1-upgradation-list' ? 'is-expanded ' : ''  }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-taxi"></i><span class="app-menu__label"> All Tour Requests </span><i class="treeview-indicator fa fa-angle-right"></i></a>

          <ul class="treeview-menu">
            <li class="treeview {{ Request::segment(1) == 'showrequest' ? 'is-expanded ' : '' || Request::segment(1) == 'show-tour-upg-bill-of-manager' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{route('showrequest')}}" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Users Tour Request List</span></i></a>
          </li>


           <li class="treeview {{ Request::segment(1) == 'show-tour-upg-bill-of-manager' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">
            Manager Tour Request List</i></a>
           </li>

           <li class="treeview {{ Request::segment(1) == 'show-tour-upg-bill-of-manager' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">
            Level_1 Tour Request List</i></a>
           </li>

          </ul>

        <li class="treeview {{ Request::segment(1) == 'tour-bill-request' ? 'is-expanded ' : '' ||  Request::segment(1) == 'show-tour-upg-bill-of-manager' ? 'is-expanded ' : ''  ||  Request::segment(1) == 'level-1-upgradation-list' ? 'is-expanded ' : ''  }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-taxi"></i><span class="app-menu__label"> All (T.A.) Bill Requests </span><i class="treeview-indicator fa fa-angle-right"></i></a>

          <ul class="treeview-menu">
            <li class="treeview {{ Request::segment(1) == 'tour-bill-request' ? 'is-expanded ' : '' || Request::segment(1) == 'show-tour-upg-bill-of-manager' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{route('tour-bill-request')}}" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Users (T.A.) Bill Requests List</span></i></a>
          </li>


           <li class="treeview {{ Request::segment(1) == 'show-tour-upg-bill-of-manager' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{route('show-tour-upg-bill-of-manager')}}" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">
            Manager Tour Request List</i></a>
           </li>

            <li class="treeview {{ Request::segment(1) == 'show-tour-upg-bill-of-manager' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">
            Level_1 Tour Request List</i></a>
           </li>

          </ul>

        </li>

         <li class="treeview {{ Request::segment(1) == 'tour-upgradation-list' ? 'is-expanded ' : '' ||  Request::segment(1) == 'manager-upgradation-list' ? 'is-expanded ' : ''  ||  Request::segment(1) == 'level-1-upgradation-list' ? 'is-expanded ' : ''  }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-taxi"></i><span class="app-menu__label"> Users Tour <br>Upgradation Request </span><i class="treeview-indicator fa fa-angle-right"></i></a>

          <ul class="treeview-menu">
            <li class="treeview {{ Request::segment(1) == 'tour-upgradation-list' ? 'is-expanded ' : '' || Request::segment(1) == 'tour-upgradation-list' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{route('tour-upgradation-list')}}" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">User Request List</span></i></a>
          </li>


           <li class="treeview {{ Request::segment(1) == 'manager-upgradation-list' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{route('manager-upgradation-list')}}" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">
            Manager Request List</i></a>

          <li class="treeview {{ Request::segment(1) == 'level1-upgradation-listl' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{route('level-1-upgradation-list')}}" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">
            Level1 Request List</i></a>
          </li>
          </li>
          </ul>

        </li>
        <li class="treeview {{ Request::segment(1) == 'user-upgradation-bill' ? 'is-expanded ' : '' ||  Request::segment(1) == 'show-tour-upg-bill-of-manager' ? 'is-expanded ' : ''  ||  Request::segment(1) == 'show-tour-upg-bill-of-level1' ? 'is-expanded ' : ''  }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-taxi"></i><span class="app-menu__label"> Users Tour Upgradation <br>Bill Request </span><i class="treeview-indicator fa fa-angle-right"></i></a>

          <ul class="treeview-menu">
            <li class="treeview {{ Request::segment(1) == 'user-upgradation-bill' ? 'is-expanded ' : '' || Request::segment(1) == 'show-tour-upg-bill-of-manager' ? 'is-expanded ' : '' || Request::segment(1) == 'show-tour-upg-bill-of-level1' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{route('user-upgradation-bill')}}" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Users Bill Request List</span></i></a>
          </li>


           <li class="treeview {{ Request::segment(1) == 'show-tour-upg-bill-of-manager' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{route('show-tour-upg-bill-of-manager')}}" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">
            Manager Bill Request List</i></a>

          <li class="treeview {{ Request::segment(1) == 'show-tour-upg-bill-of-level1' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{route('show-tour-upg-bill-of-level1')}}" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">
            Level1 Bill Request List</i></a>
          </li>
          </li>
          </ul>

        </li>

        
        {{-- @endrole --}}
      </ul>
      @endrole

    {{--End  Nabar for admin admin --}}

    {{-- Nabar for admin level1 --}}

   @role('tour_admin')
      
      <ul class="app-menu siderbar1">
        <li><a class="app-menu__item" href="{{route('home')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard (Admin)</span></a></li>
        
      <li class="treeview {{ Request::segment(1) == 'tour-and-travel-policies' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{url('tour-and-travel-policies')}}" ><i class="app-menu__icon fa fa-user-secret"></i><span class="app-menu__label">
           Your Tour And <br>Travel Policies</span></i></a>
      </li>   
      
       {{-- <li class="treeview {{ Request::segment(1) == 'showrequest' ? 'is-expanded ' : '' ||Request::segment(1) == 'showrequest' ? 'is-expanded ' : '' }}">
            <a class="app-menu__item" href="{{route('showrequest')}}" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label"> Users Tour Requests</span>
            </a>  
        </li> --}}

      <li class="treeview {{ Request::segment(1) == 'showrequest' ? 'is-expanded ' : '' ||  Request::segment(1) == 'show-tour-upg-bill-of-manager' ? 'is-expanded ' : ''  ||  Request::segment(1) == 'level-1-upgradation-list' ? 'is-expanded ' : ''  }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-taxi"></i><span class="app-menu__label"> All Tour Requests </span><i class="treeview-indicator fa fa-angle-right"></i></a>

          <ul class="treeview-menu">
            <li class="treeview {{ Request::segment(1) == 'showrequest' ? 'is-expanded ' : '' || Request::segment(1) == 'show-tour-upg-bill-of-manager' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{route('showrequest')}}" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Users Tour Request List</span></i></a>
          </li>


           <li class="treeview {{ Request::segment(1) == 'show-tour-upg-bill-of-manager' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{route('show-tour-upg-bill-of-manager')}}" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">
            Manager Tour Request List</i></a>
           </li>
          </ul>

        <li class="treeview {{ Request::segment(1) == 'tour-bill-request' ? 'is-expanded ' : '' ||  Request::segment(1) == 'show-tour-upg-bill-of-manager' ? 'is-expanded ' : ''  ||  Request::segment(1) == 'level-1-upgradation-list' ? 'is-expanded ' : ''  }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-taxi"></i><span class="app-menu__label"> All (T.A.) Bill Requests </span><i class="treeview-indicator fa fa-angle-right"></i></a>

          <ul class="treeview-menu">
            <li class="treeview {{ Request::segment(1) == 'tour-bill-request' ? 'is-expanded ' : '' || Request::segment(1) == 'show-tour-upg-bill-of-manager' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{route('tour-bill-request')}}" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Users (T.A.) Bill Requests List</span></i></a>
          </li>


           <li class="treeview {{ Request::segment(1) == 'show-tour-upg-bill-of-manager' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{route('show-tour-upg-bill-of-manager')}}" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">
            Manager Tour Request List</i></a>

         
           </li>
          </ul>

        </li>
        {{--  <li class="treeview {{ Request::segment(1) == 'tour-amount-bill' ? 'is-expanded ' : '' }}">
            <a class="app-menu__item" href="{{route('tour-bill-request')}}" ><i class="app-menu__icon fa fa-files-o"></i><span class="app-menu__label">Users (T.A.) Bill Requests</span></i></a>
              
          </li>
          --}}

           <li class="treeview {{ Request::segment(1) == 'tour-admin-upgradation' ? 'is-expanded ' : '' ||  Request::segment(1) == 'level1-tour-upg-bill' ? 'is-expanded ' : ''  }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-taxi"></i><span class="app-menu__label">Tour Request<br> For Upgradation</span><i class="treeview-indicator fa fa-angle-right"></i></a>

          <ul class="treeview-menu">
            <li class="treeview {{ Request::segment(1) == 'tour-admin-upgradation' ? 'is-expanded ' : '' || Request::segment(1) == 'tour-admin-upgradation' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{url('tour-admin-upgradation')}}" ><i class="app-menu__icon fa fa-send"></i><span class="app-menu__label">Request For <br>Upgradation</span>{{-- <i class="treeview-indicator fa fa-angle-right"> --}}</i></a>
          </li>


           <li class="treeview {{ Request::segment(1) == 'level1-tour-upg-bill' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{route('level1-tour-upg-bill.index')}}" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">
            Tour Upgradation <br>Bill List</span>{{-- <i class="treeview-indicator fa fa-angle-right"> --}}</i></a>
          </li>
          </ul>

        </li>
         
          <li class="treeview {{ Request::segment(1) == 'tour-upgradation-list' ? 'is-expanded ' : '' ||  Request::segment(1) == 'manager-upgradation-list' ? 'is-expanded ' : ''  }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-taxi"></i><span class="app-menu__label">User Tour <br>Upgradation Request </span><i class="treeview-indicator fa fa-angle-right"></i></a>

          <ul class="treeview-menu">
            <li class="treeview {{ Request::segment(1) == 'tour-upgradation-list' ? 'is-expanded ' : '' || Request::segment(1) == 'manager-upgradation-list' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{route('tour-upgradation-list')}}" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">User Request List</span></i></a>
          </li>


           <li class="treeview {{ Request::segment(1) == 'manager-upgradation-list' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{route('manager-upgradation-list')}}" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">
            Manager Request List</i></a>

          </li>
          </ul>

        </li>
        <li class="treeview {{ Request::segment(1) == 'user-upgradation-bill' ? 'is-expanded ' : '' ||  Request::segment(1) == 'show-tour-upg-bill-of-manager' ? 'is-expanded ' : ''  ||  Request::segment(1) == 'level-1-upgradation-list' ? 'is-expanded ' : ''  }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-taxi"></i><span class="app-menu__label"> Users Tour Upgradation <br>Bill Request </span><i class="treeview-indicator fa fa-angle-right"></i></a>

          <ul class="treeview-menu">
            <li class="treeview {{ Request::segment(1) == 'user-upgradation-bill' ? 'is-expanded ' : '' || Request::segment(1) == 'show-tour-upg-bill-of-manager' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{route('user-upgradation-bill')}}" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Users Bill Request List</span></i></a>
          </li>


           <li class="treeview {{ Request::segment(1) == 'show-tour-upg-bill-of-manager' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{route('show-tour-upg-bill-of-manager')}}" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">
            Manager Bill Request List</i></a>

         
           </li>
          </ul>

      </ul>
      @endrole
    {{-- Nabar for admin level1 --}}


    {{-- Nabar for admin Manager --}}

      @role('tour_manager')
      <ul class="app-menu">
        <li><a class="app-menu__item" href="{{route('home')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard (Manager)</span></a></li>

           <li class="treeview {{ Request::segment(1) == 'tour-and-travel-policies' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{url('tour-and-travel-policies')}}" ><i class="app-menu__icon fa fa-user-secret"></i><span class="app-menu__label">
           Your Tour And <br>Travel Policies</span></i></a>
          </li>
     
            <li class="treeview {{ Request::segment(1) == 'TourRequest' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{ route('TourRequest.index') }}" {{-- data-toggle="treeview" --}}><i class="app-menu__icon fa fa-send"></i><span class="app-menu__label">Send Request for Tour</span></i></a>

          <li class="treeview {{ Request::segment(1) == 'tour-amount-bill' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{route('tour-amount-bill.index')}}" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">All (T.A.) Bill</span></i></a>

          
       
         

         <li class="treeview {{ Request::segment(1) == 'showrequest' ? 'is-expanded ' : '' ||Request::segment(1) == 'showrequest' ? 'is-expanded ' : '' }}">
            <a class="app-menu__item" href="{{route('showrequest')}}" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Users Tour Requests</span></i></a>
          </li>
        
        </li>
        <li class="treeview {{ Request::segment(1) == 'tour-bill-request' ? 'is-expanded ' : ''||Request::segment(1) == 'tour-bill-request' ? 'is-expanded ' : '' }}">
            <a class="app-menu__item" href="{{route('tour-bill-request')}}" ><i class="app-menu__icon fa fa-files-o"></i></i><span class="app-menu__label">Users (T.A.) Bill Requests</span></a>
          </li>

          <li class="treeview {{ Request::segment(1) == 'tour-manager-upgradation' ? 'is-expanded ' : '' ||  Request::segment(1) == 'tour-manager-upgradation' ? 'is-expanded ' : ''  ||  Request::segment(1) == 'manager-tour-upg-bill' ? 'is-expanded ' : ''  }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-taxi"></i><span class="app-menu__label">Tour Upgradation</span><i class="treeview-indicator fa fa-angle-right"></i></a>

          <ul class="treeview-menu">
            <li class="treeview {{ Request::segment(1) == 'tour-manager-upgradation' ? 'is-expanded ' : '' || Request::segment(1) == 'manager-tour-upg-bill' ? 'is-expanded ' : '' || Request::segment(1) == 'tour-upgradation-manager-bill' ? 'is-expanded ' : ''}}"><a class="app-menu__item" href="{{route('tour-manager-upgradation.index')}}" ><i class="app-menu__icon fa fa-send"></i><span class="app-menu__label">Request For <br>Upgradation</span></i></a>
          </li>


           <li class="treeview {{ Request::segment(1) == 'manager-tour-upg-bill' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{route('manager-tour-upg-bill.index')}}" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">
            Tour Upgradation <br>Bill List</span></i></a>
          </li>
          </ul>
        </li>
          <li class="treeview {{ Request::segment(1) == 'tour-amount-bill' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{route('tour-upgradation-list')}}" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">
              User Tour Upgradation <br>Request List</span></i></a>
          </li>
          <li class="treeview {{ Request::segment(1) == 'user-upgradation-bill' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{url('user-upgradation-bill')}}" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">
              User Bills Tour <br>Upgradation Request List</span></i></a>
          </li>
      </ul>
      @endrole
    {{--End Nabar for admin Manager --}}

    {{-- Nabar for admin user --}}

   @role('tour_user')
    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script
        src="https://code.jquery.com/jquery-3.5.0.js"
        integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc="
        crossorigin="anonymous"></script>
     <script >
      $(document).ready(function(){

              //alert('.sidebar1 a');
              $('.sidebar1 a').click(function(){
              alert('.sidebar1 a');
               $('.sidebar1 .active').removeClass('active');
              $(this).parent().addClass('active');
        

      }); 
      });
     </script> --}}
      <ul class="app-menu sidebar1">
        <li class="active"><a class="app-menu__item" href="{{route('home')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard (User)</span></a></li>
        <li class="treeview  {{ Request::segment(1) == 'tour-and-travel-policies' ? 'is-expanded ' : '' }}">
          <a class="app-menu__item" href="{{url('tour-and-travel-policies')}}" ><i class="app-menu__icon fa fa-user-secret"></i><span class="app-menu__label">
           Your Tour And <br>Travel Policies</span></i></a>
          </li>
        <li class="treeview {{ Request::segment(1) == 'TourRequest' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{ route('TourRequest.index') }}" {{-- data-toggle="treeview" --}}><i class="app-menu__icon fa fa-send"></i></i><span class="app-menu__label">Send Request for Tour</span>{{-- <i class="treeview-indicator fa fa-angle-right"> --}}</i></a>
          {{-- <ul class="treeview-menu">
            <li><a class="treeview-item sub-menu__item" href="{{route('TourRequest.index')}}"><i class="icon fa fa-circle-o"></i> Send Request</a></li>
        </ul> --}}
        </li>

        <li class="treeview {{ Request::segment(1) == 'tour-amount-bill' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{route('tour-amount-bill.index')}}" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">All (T.A.) Bill</span>{{-- <i class="treeview-indicator fa fa-angle-right"> --}}</i></a>
       
       
        <li class="treeview {{ Request::segment(1) == 'tour-exp-upgradation' ? 'is-expanded ' : '' ||  Request::segment(1) == 'tour-bill-upgradation' ? 'is-expanded ' : ''  }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-taxi"></i><span class="app-menu__label">Tour Request<br> For Upgradation</span><i class="treeview-indicator fa fa-angle-right"></i></a>

          <ul class="treeview-menu">
            <li class="treeview {{ Request::segment(1) == 'tour-exp-upgradation' ? 'is-expanded ' : '' || Request::segment(1) == 'tour-bill-upgradation' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{url('tour-exp-upgradation')}}" ><i class="app-menu__icon fa fa-send"></i><span class="app-menu__label">Request For <br>Upgradation</span>{{-- <i class="treeview-indicator fa fa-angle-right"> --}}</i></a>
          </li>


          <li class="treeview {{ Request::segment(1) == 'tour-bill-upgradation' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{url('tour-bill-upgradation')}}" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">
            Tour Upgradation <br>Bill List</span>{{-- <i class="treeview-indicator fa fa-angle-right"> --}}</i></a>
         
        </li>

        </li>
    </ul>
      
      </ul>
      @endrole
    {{-- End  Nabar for admin Manager --}}


    {{-- Nabar for admin Accountant --}}

   @role('tour_accountant')

      <ul class="app-menu">
        <li><a class="app-menu__item" href="{{route('home')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard (Accountant)</span></a></li>
        
        <li class="treeview {{ Request::segment(1) == 'tour-and-travel-policies' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{url('tour-and-travel-policies')}}" ><i class="app-menu__icon fa fa-user-secret"></i><span class="app-menu__label">
           Your Tour And <br>Travel Policies</span></i></a>
        </li>

       <li class="treeview {{ Request::segment(1) == 'TourRequest' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{ route('TourRequest.index') }}" {{-- data-toggle="treeview" --}}><i class="app-menu__icon fa fa-send"></i><span class="app-menu__label">Send Request for Tour</span>{{-- <i class="treeview-indicator fa fa-angle-right"> --}}</i></a>
       
        </li>

        <li class="treeview {{ Request::segment(1) == 'tour-amount-bill' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{route('tour-amount-bill.index')}}" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">All (T.A.) Bill</span>{{-- <i class="treeview-indicator fa fa-angle-right"> --}}</i></a>
       
        </li>


       <li class="treeview {{ Request::segment(1) == 'showrequest' ? 'is-expanded ' : '' ||Request::segment(1) == 'showrequest' ? 'is-expanded ' : '' }}">
            <a class="app-menu__item" href="{{route('showrequest')}}" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Users Tour Requests</span>{{-- <i class="treeview-indicator fa fa-angle-right"></i> --}}</a>
          
          </li>
        
        </li>
         <li class="treeview {{ Request::segment(1) == 'tour-amount-bill' ? 'is-expanded ' : '' }}">
            <a class="app-menu__item" href="{{route('tour-bill-request')}}" ><i class="app-menu__icon fa fa-files-o"></i><span class="app-menu__label"> Users (T.A.) Bill Request</span>{{-- <i class="treeview-indicator fa fa-angle-right"> --}}</i></a>
              <ul class="treeview-menu">
                  {{-- <li><a class="treeview-item sub-menu__item" href="{{route('tour-bill-request')}}"><i class="icon fa fa-circle-o"></i> Request</a></li> --}}
              </ul>
        {{--  <li class="treeview {{ Request::segment(1) == 'company' ? 'is-expanded ' : ''  }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-taxi"></i><span class="app-menu__label">Tour Exception</span><i class="treeview-indicator fa fa-angle-right"></i></a>

          <ul class="treeview-menu">
            <li class="treeview {{ Request::segment(1) == 'tour-amount-bill' ? 'is-expanded ' : '' || Request::segment(1) == 'tour-amount-bill' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{url('tour-exp-upgradation')}}" ><i class="app-menu__icon fa fa-send"></i><span class="app-menu__label">Tour Request For <br>Upgradation</span></i></a>
          </li>


           <li class="treeview {{ Request::segment(1) == 'tour-amount-bill' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">
            Tour Upgradation <br>Bill List</span></i></a>
          </li>
          </ul>
        </li> --}}

          </li>

         <li class="treeview {{ Request::segment(1) == 'user-upgradation-bill' ? 'is-expanded ' : '' ||  Request::segment(1) == 'show-tour-upg-bill-of-manager' ? 'is-expanded ' : ''  ||  Request::segment(1) == 'show-tour-upg-bill-of-level1' ? 'is-expanded ' : ''  }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-taxi"></i><span class="app-menu__label"> Users Tour Upgradation <br>Bill Request </span><i class="treeview-indicator fa fa-angle-right"></i></a>

          <ul class="treeview-menu">
            <li class="treeview {{ Request::segment(1) == 'user-upgradation-bill' ? 'is-expanded ' : '' || Request::segment(1) == 'tour-upgradation-list' ? 'is-expanded ' : '' || Request::segment(1) == 'show-tour-upg-bill-of-level1' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{route('user-upgradation-bill')}}" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Users Bill Request List</span></i></a>
          </li>


            <li class="treeview {{ Request::segment(1) == 'show-tour-upg-bill-of-manager' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{route('show-tour-upg-bill-of-manager')}}" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">
            Manager Bill Request List</i></a>

         
           </li>

          <li class="treeview {{ Request::segment(1) == 'show-tour-upg-bill-of-level1' ? 'is-expanded ' : '' }}"><a class="app-menu__item" href="{{route('show-tour-upg-bill-of-level1')}}" ><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">
            Level1 Bill Request List</i></a>
          </li>
          </li>          
          </ul>    

      </ul>
      @endrole
    {{-- Nabar for admin Accountant --}}
    </aside>
  
