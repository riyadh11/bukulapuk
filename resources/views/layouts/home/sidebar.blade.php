            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>

                        	<li class="text-muted menu-title">Navigation</li>

                            <li class="has_sub">
                                <a href="#;" class="waves-effect"><i class="md-apps"></i><span> Kategori </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    @foreach($Categories as $Category)
                                    <li><a href="/category/{{ $Category->id }}"> {{ $Category->name }} </a></li>
                                    @endforeach
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#;" class="waves-effect"><i class="typcn typcn-tag"></i><span> Penerbit </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">    
                                     @foreach($Publishers as $Publisher)
                                    <li><a href="/publisher/{{ $Publisher->id }}"> {{ $Publisher->name }} </a></li>
                                     @endforeach
                                </ul>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->