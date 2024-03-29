<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p style="overflow: hidden;text-overflow: ellipsis;max-width: 160px;" data-toggle="tooltip" title="{{ Auth::user()->name }}">{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <!-- Optionally, you can add icons to the links -->
            @if (Auth::user()->is_admin)
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">ADMIN MENU</li>
                    <li><a href="{{ url('/user')  }}">      <i class='fa fa-users'> </i>Users</a> </li>
                    <li><a href="{{ url('/log-viewer') }}" target="_blank"><i class='fa fa-bug'> </i>Logs</a> </li>
                </ul>
            @endif
            <li class="header">LINKS</li>
            <li><a href="{{ url('/song')  }}">      <i class='fa fa-users'> </i>Songs</a> </li>
            <li><a href="{{ url('/musicians')  }}">      <i class='fa fa-users'> </i>Musicians</a> </li>
            <li><a href="{{ url('/services')  }}">      <i class='fa fa-users'> </i>Services</a> </li>
            <li><a href="{{ url('/charts')  }}">      <i class='fa fa-users'> </i>Charts</a> </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
