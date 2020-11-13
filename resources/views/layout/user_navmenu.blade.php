<div class="main-menu-area mg-tb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                    <li class="active"><a data-toggle="tab" href="#Home"><i class="notika-icon notika-house"></i> MENU</a>
                    </li>
                   
                    <li><a href="{{route('logout')}}"><i class="notika-icon notika-windows"></i> Logout</a>
                    </li>
                    
                </ul>
                <div class="tab-content custom-menu-content">
                    <div id="Home" class="tab-pane in active notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                        <li>{{$current_user}}</li>
                            </li>
                            <li><a href="{{ route('shaes_list')}}">View Share List</a>
                            </li>

                        </ul>
                    </div>
                   
                    
                
                   
                </div>
            </div>
        </div>
    </div>
</div>
