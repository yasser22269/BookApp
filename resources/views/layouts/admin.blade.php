

    @include('Admin.layouts.header')

    @include('Admin.layouts.nav')

    <div class="app-content content">
        <div class="content-wrapper">
          <div class="content-header row">
          </div>
          @include('Admin.layouts.sidebar')
                <div class="content-body">
                    @include('Admin.layouts.alerts.alerts')
                @yield('content')
                </div>
        </div>
      </div>



  @include('Admin.layouts.footer')
  
