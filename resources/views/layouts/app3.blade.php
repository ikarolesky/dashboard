@include('layouts.sublayout.links')
@include('layouts.sublayout.newheader')
@include('layouts.sublayout.newsidebar')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <h3>@yield('tittle')</h3>

            </div>
            <div class="content-body">
                <section class="invoice-print mb-1">
                    <div class="row">

                </section>
                <section class="card invoice-page">
                    <div id="invoice-template" class="card-body">
                        <div id="invoice-company-details" class="row">
                            <div class="col-sm-6 col-12 text-left pt-1">
                                <div class="media pt-1">
                                </div>
                            @yield('content')
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
@include('layouts.sublayout.newfooter')
@include('layouts.sublayout.scripts')
</html>