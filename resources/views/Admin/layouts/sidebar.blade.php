

  <div class="main-menu menu-static menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" navigation-header">
            <span data-i18n="nav.Users.pages">Users</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Pages"></i>
          </li>
          <li class="nav-item  {{ Request::is(app()->getLocale().'/Admin/Users*') ? 'active' : '' }}"><a href="{{ route('Users.index') }}"><i class="la la-user"></i><span class="menu-title" >Users</span><span class="badge badge badge-info float-right"> {{ App\Models\User::count() }} </span></a>
        </li>
            <li class=" navigation-header">
             <span data-i18n="nav.Users.pages">Children</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Pages"></i>
            </li>
            <li class="nav-item  {{ Request::is(app()->getLocale().'/Admin/Children*') ? 'active' : '' }}"><a href="{{ route('Children.index') }}"><i class="la la-user"></i><span class="menu-title" >Children</span><span class="badge badge badge-info float-right"> {{ App\Models\Child::count() }} </span></a>
          </li>
            <li class=" navigation-header">
              <span data-i18n="nav.Users.pages">Publishers</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Pages"></i>
            </li>
            <li class="nav-item  {{ Request::is(app()->getLocale().'/Admin/Publishers*') ? 'active' : '' }}"><a href="{{ route('Publishers.index') }}"><i class="la la-user"></i><span class="menu-title" >Publishers</span><span class="badge badge badge-info float-right"> {{ App\Models\Publisher::count() }} </span></a>
          </li>
          <li class=" navigation-header">
              <span data-i18n="nav.Users.pages">Books</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Pages"></i>
          </li>
          <li class="nav-item  {{ Request::is(app()->getLocale().'/Admin/Books*') ? 'active' : '' }}"><a href="{{ route('Books.index') }}"><i class="la la-user"></i><span class="menu-title" >Books</span><span class="badge badge badge-info float-right"> {{ App\Models\Book::count() }} </span></a>
          </li>

        <li class=" navigation-header"> </li>
        <li class=" navigation-header"> </li>
        <li class=" navigation-header"> </li>
        <li class=" navigation-header"> </li>
      </ul>
    </div>
  </div>
