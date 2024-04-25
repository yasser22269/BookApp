<!-- ////////////////////////////////////////////////////////////////////////////-->
<footer class="footer footer-static footer-light navbar-border">
  <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
    <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2018 <a class="text-bold-800 grey darken-2" href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent"
      target="_blank">PIXINVENT </a>, All rights reserved. </span>
    <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span>
  </p>
</footer>
<!-- BEGIN VENDOR JS-->
<script src="{{asset('/')}}app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset('/')}}app-assets/vendors/js/ui/headroom.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}app-assets/vendors/js/charts/chartist.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js"
type="text/javascript"></script>
<script src="{{asset('/')}}app-assets/vendors/js/charts/raphael-min.js" type="text/javascript"></script>
<script src="{{asset('/')}}app-assets/vendors/js/charts/morris.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}app-assets/vendors/js/timeline/horizontal-timeline.js" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->





<!-- BEGIN MODERN JS-->
<script src="{{asset('/')}}app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="{{asset('/')}}app-assets/js/core/app.js" type="text/javascript"></script>
<script src="{{asset('/')}}app-assets/js/scripts/customizer.js" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset('/')}}app-assets/js/scripts/pages/dashboard-ecommerce.js" type="text/javascript"></script>

<script src="{{asset('/')}}app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}app-assets/js/scripts/tables/datatables/datatable-basic.js" type="text/javascript"></script>

@yield('js')


<script src="//js.pusher.com/3.1/pusher.min.js"></script>

<script>
    var previousCounter = $('.notification-counter').text(); //5
    var notificationsCount = parseInt(previousCounter);

    var pusher = new Pusher('174384ae132928fe9a82', {
        encrypted: true
    });
    //Pusher.logToConsole = true;
    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('ecommerceFirst_e_e');
    // Bind a function to a Our Event
    channel.bind('App\\Events\\NewOrder', function(data) {
        notificationsCount += 1;
        $('.notification-counter').show();
        $('.notification-counter').text(notificationsCount);
        $order_id = data.order_id;
        var newNotificationHtml = `<a href="{{ url('Admin/OrderAdmin/`+data.order_id+`') }}">
            <div class="media">
              <div class="media-left align-self-center"><i class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
              <div class="media-body">
                <h6 class="media-heading">You have new order!</h6>
                <p class="notification-text font-small-3 text-muted">`+data.user.name + data.order_total +`$</p>
                {{-- <small>
                  <time class="media-meta text-muted" datetime="`+data.order_date  + +`">`+data.order_date+`</time>
                </small> --}}
              </div>
            </div>
          </a> `;
          var existingNotifications = $('#notificationsTitlePusher').html();

          $('#notificationsTitlePusher').html(newNotificationHtml + existingNotifications);
    });
</script>
</body>
</html>
