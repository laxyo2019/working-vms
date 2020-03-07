<li class="dropdown "><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications" aria-expanded="true"><i class="fa fa-bell fa-lg"></i>
<?php
if(count(Auth::user()->unreadNotifications) !=0){ ?>
  <sup class="label label-danger"><b>{{count(Auth::user()->unreadNotifications)}}</b></sup></a>

<?php
}
?>
  <ul class="app-notification dropdown-menu dropdown-menu-right" style="position: absolute; will-change: transform; top: 0px; left: 0px; width:315px;transform: translate3d(-221px, 50px, 0px);">
    <li class="app-notification__title">You have <b>{{count(Auth::user()->unreadNotifications)}}</b> new notifications.</li>
    <li class="app-notification__footer"><a href="#" class="btn btn-primary">See all notifications.</a></li>

    <div class="app-notification__content" style="height: 300px; overflow-y: scroll;">

      @foreach(Auth::user()->unreadNotifications as $notification)
        <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
          <div>
            <p class="app-notification_title"><b>{{str_limit($notification['data']['title'], $limit = 50, $end = '...') }}</b> </p>
            <p class="app-notification__message"><b>VEHICLE NO :</b><i>{{$notification['data']['message']}}</i></p>
            <p class="app-notification__message"><b>EXPIRE DATE :</b><i>{{$notification['data']['date']}}</i></p>
            <p class="app-notification__meta pull-right">{{$notification['created_at']->diffForHumans()}}</p>
          </div></a></li>
        @endforeach
      </div>
    </div>
  </ul>
</li>