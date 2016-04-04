<!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="/images/avatar.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{ $logged_user->username }}</p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- search form (Optional) -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">Components</li>
            <!-- Optionally, you can add icons to the links -->
            @if ($page_title == "Dashboard")
            <li class="active"><a href="{{ route('user.dashboard', $logged_user->username) }}"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
            @else
            <li><a href="{{ route('user.dashboard', $logged_user->username) }}"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
            @endif

            @if ($page_title == "Profile")
            <li class="active"><a href="{{ route('user.profile', $logged_user->username) }}"><i class="fa fa-user"></i> <span>Profile</span></a></li>
            @else
            <li><a href="{{ route('user.profile', $logged_user->username) }}"><i class="fa fa-user"></i> <span>Profile</span></a></li>
            @endif

            @if ($page_title == "Pages")
            <li class="active"><a href="{{ route('user.pages', $logged_user->username) }}"><i class="fa fa-file"></i> <span>Pages</span></a></li>
            @else
            <li><a href="{{ route('user.pages', $logged_user->username) }}"><i class="fa fa-file"></i> <span>Pages</span></a></li>
            @endif

            @if ($page_title == "Products")
            <li class="active"><a href="{{ route('user.products', $logged_user->username) }}"><i class="fa fa-archive"></i> <span>Products</span></a></li>
            @else
            <li><a href="{{ route('user.products', $logged_user->username) }}"><i class="fa fa-archive"></i> <span>Products</span></a></li>
            @endif
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>