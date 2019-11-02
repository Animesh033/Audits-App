<nav class="navbar navbar-fixed-top">
        <a class="navbar-brand logo1" href="#">
          <img src="{{asset('assets/images/ci.png')}}" alt=" " width="60">
          <small class="logo-name">ComplyIndia </small>
        </a>
        <a class="navbar-brand logo2" href="#">
          <img src="{{asset('assets/images/ci.png')}}" alt=" " width="50">
          <small class="logo-name">Ocs</small>
        </a>
    </nav>

<div class="page-wrapper chiller-theme toggled">
  <!-- <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a> -->
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">

      <!-- user details -->
      {{-- <div class="sidebar-header">
        <div class="user-pic">
          <img class="img-responsive img-rounded" src="{{asset('assets/images/user.png')}}"
            alt="User picture">
        </div>
        <div class="user-info">
          <span class="user-name">John Smith</span>
          <a href="#" class="caret"><i class="fas fa-caret-down"></i></a>
          <span class="user-role">Admin</span>
        </div>
      </div> --}}
      
    <div class="sidebar-header">
      <div class="user-pic">
        <img class="img-responsive img-rounded" src="{{asset('assets/images/user.png')}}"
          alt="User picture">
      </div>
      <div class="user-info">
        <ul class="nav userdetails">      
            <li>
                <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                    <span class="user-name">John Smith</span>
                </a>
                <ul class="user-menu dropdown-menu">
                    <li>
                        <a href="#">
                            <i class="fa fa-cog"></i>
                            Settings
                        </a>
                    </li>
                    <li>
                        <a href="profile.html">
                            <i class="fa fa-user"></i>
                            Profile
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                       <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form2').submit();">
                           <i class="ace-icon fa fa-power-off"></i>
                            {{ __('Logout') }}
                       </a>
                       <form id="logout-form2" action="{{ route('logout') }}" method="POST" style="display: none;">
                           {{ csrf_field() }}
                       </form>
                    </li>
                </ul>
            </li>
        </ul>
        <span class="user-role">Admin</span>
      </div>
    </div>
     <div class="sidebar-menu">
            <ul>
              <li class="sidebar">
                <a href="dashboard.html">
                  <i class="fa fa-tachometer-alt"></i>
                  <span>Dashboard</span>
                </a>
              </li>
              <li class="sidebar">
                <a href="user.html">
                  <i class="fas fa-users"></i>
                  <span>Users</span>
                </a>
              </li>
              <li class="sidebar">
                <a href="{{route('roles.index')}}">
                  <i class="fas fa-users"></i>
                  <span>Roles</span>
                </a>
              </li>
              <li class="sidebar">
                <a href="{{route('states.index')}}">
                  <i class="fas fa-map"></i>
                  <span>States</span>
                </a>
              </li>
              <li class="sidebar">
                <a href="{{route('cities.index')}}">
                  <i class="fas fa-city"></i>
                  <span>Cities</span>
                </a>
              </li>
              <li class="sidebar">
                <a href="regions.html">
                 <i class="fas fa-landmark"></i>
                  <span>Regions</span>
                </a>
              </li>
              <li>
                <a href="clients.html">
                  <i class="fas fa-industry"></i>
                  <span>Clients</span>
                </a>
              </li>
              <li>
                <a href="scheduler.html">
                  <i class="fas fa-calendar-alt"></i>
                  <span>Scheduler</span>
                </a>
              </li>
              <li>
                <a href="checklist.html">
                  <i class="fas fa-clipboard-list"></i>
                  <span>Checklist</span>
                </a>
              </li>
            </ul>
          </div>
    </div>
   
  </nav>

</div>