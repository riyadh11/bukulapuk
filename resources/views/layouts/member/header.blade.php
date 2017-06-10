            <!-- ========== Top Bar Start ========== -->
            <div class="topbar">

                <div class="topbar-left">
                    <div class="text-center">
                        <a href="/" class="logo"><i class="icon-book-open icon-c-logo"></i><span>BUKULAPUK</span></a>
                    </div>
                </div>

                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left waves-effect waves-light">
                                    <i class="md md-menu"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>

                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown top-menu-item-xs">
                                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true" onclick="readNotification()">
                                        <i class="icon-bell"></i> <span class="badge badge-xs badge-danger">{{$Member->Notification->where('check',false)->count()}}</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="notifi-title"><span class="label label-default pull-right">There are {{$Member->Notification->where('check',false)->count()}}</span> New Notification</li>
                                        <li class="list-group slimscroll-noti notification-list">
                            
                                           <!-- list item-->
                                           @foreach($Member->Notification->sortByDesc('id') as $notification)
                                           <a href="#;" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left p-r-10">
                                                    @if($notification->type==1)
                                                    <em class="fa fa-cog noti-warning"></em>
                                                    @elseif($notification->type==2)
                                                    <em class="fa fa-shopping-cart noti-info"></em>
                                                    @elseif($notification->type==3)
                                                    <em class="fa fa-shopping-cart noti-success"></em>
                                                    @elseif($notification->type==4)
                                                    <em class="fa fa-shopping-cart noti-warning"></em>
                                                    @elseif($notification->type==5)
                                                    <em class="fa fa-shopping-cart noti-warning"></em>
                                                    @elseif($notification->type==6)
                                                    <em class="fa fa-book noti-success"></em>
                                                    @elseif($notification->type==7)
                                                    <em class="fa fa-book noti-warning"></em>
                                                    @elseif($notification->type==8)
                                                    <em class="fa fa-comment noti-info"></em>
                                                    @elseif($notification->type==9)
                                                    <em class="fa fa-shopping-cart noti-success"></em>
                                                    @endif
                                                 </div>
                                                 <div class="media-body">
                                                    <h5 class="media-heading">{{Strtoupper($notification->Type->name)}}</h5>
                                                    <p class="m-0">
                                                        <small>{{$notification->text}}</small>
                                                    </p>
                                                 </div>
                                              </div>
                                           </a>
                                           @endforeach
                                        </li>
                                    </ul>
                                    </li>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="icon-settings"></i></a>
                                </li>
                                <li class="dropdown top-menu-item-xs">
                                    <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><img src="/assets/images/users/{{$Member->Bio->img}}" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                         <li><a><small>Welcome {{$Member->username}}!</small></a></li>
                                         <li><a href="/member/profile"><i class="ti-user m-r-10 text-success"></i>Profile</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#" onclick="logout()"><i class="ti-power-off m-r-10 text-danger"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- ========== Top Bar End ========== -->
