<!-- BEGIN: Layout-->
@include('layouts.sublayout.links')
@include('layouts.sublayout.newheader')
@include('layouts.sublayout.newsidebar')
<!-- END: Layout-->
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                    <div class="content-header-left col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="col-12">
                                <h2 class="content-header-title float-left mb-0">@yield('title')</h2>
                                    @yield('breadcrumbs')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                  @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->
<!-- BEGIN: Footer-->
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
@include('layouts.sublayout.newfooter')
<!-- END: Footer-->
<!-- BEGIN: Scripts-->
@include('layouts.sublayout.newscripts')
<!-- END: Scripts-->
</html>