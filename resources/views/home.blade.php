@extends('layouts.app2')

@section('content')
 <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-home icon-gradient bg-mean-fruit">
                                        </i>
                                    </div>
                                <div class="page-title-heading">
                                    <div>Dashboard
                                        <div class="page-title-subheading">
                                        </div>
                                    </div>
                                </div>
                             </div>
                        </div>

                        <div class="main-card mb-3 card">



                    <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                    </div>
                    @endif
                    Bem-vindo, {{Auth::user()->name}}!!
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
