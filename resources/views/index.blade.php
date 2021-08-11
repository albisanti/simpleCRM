@include('layout.header')
@include('layout.footer')
@yield('header_section')
            <!-- content @s -->
            <div class="nk-content nk-content-lg nk-content-fluid">
                <div class="container-xl wide-lg">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            <div class="nk-block-head">
                                <div class="nk-block-between-md g-3">
                                    <div class="nk-block-head-content">
                                        <div class="nk-block-head-sub"><span>Welcome!</span></div>
                                        <div class="align-center flex-wrap pb-2 gx-4 gy-3">
                                            <div>
                                                <h2 class="nk-block-title fw-normal">Alberto Dev</h2>
                                            </div>
                                        </div>
                                        <div class="nk-block-des">
                                        <div class="nk-block-des">
                                            <p>Select what are you looking for and find what you need</p>
                                        </div>
                                    </div><!-- .nk-block-head-content -->
                                </div><!-- .nk-block-between -->
                            </div><!-- .nk-block-head -->
                            @if(session('status'))
                            <div class="nk-block">
                                <div class="alert alert-success alert-icon">
                                    <em class="icon ni ni-check-circle"></em>
                                    <strong>{{session('status')}}</strong>.
                                </div>
                            </div><!-- .nk-block -->
                            @endif
                            <div class="nk-block">
                                <div class="row gy-gs">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="nk-wg-card card card-bordered h-100">
                                            <div class="card-inner h-50">
                                                <div class="nk-iv-wg2">
                                                    <!--<div class="nk-iv-wg2-title">
                                                        <h6 class="title">Balance in Account</h6>
                                                    </div>-->
                                                    <div class="nk-iv-wg2-text">
                                                        <div class="nk-iv-wg2-amount ui-v2">Suppliers</div>
                                                        Search the supplier here
                                                    </div>
                                                    <div class="nk-iv-wg2-cta">
                                                        <a href="/suppliers" class="btn btn-primary btn-lg btn-block">Search</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    <div class="col-md-6 col-lg-4">
                                        <div class="nk-wg-card card card-bordered h-100">
                                            <div class="card-inner h-50">
                                                <div class="nk-iv-wg2">
                                                    <!--<div class="nk-iv-wg2-title">
                                                        <h6 class="title">Balance in Account</h6>
                                                    </div>-->
                                                    <div class="nk-iv-wg2-text">
                                                        <div class="nk-iv-wg2-amount ui-v2">Customers</div>
                                                        Search the customer here
                                                    </div>
                                                    <div class="nk-iv-wg2-cta">
                                                        <a href="/customers" class="btn btn-primary btn-lg btn-block">Search</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    @can('create')
                                    <div class="col-md-6 col-lg-4">
                                        <div class="nk-wg-card card card-bordered h-100">
                                            <div class="card-inner h-50">
                                                <div class="nk-iv-wg2">
                                                    <!--<div class="nk-iv-wg2-title">
                                                        <h6 class="title">Balance in Account</h6>
                                                    </div>-->
                                                    <div class="nk-iv-wg2-text">
                                                        <div class="nk-iv-wg2-amount ui-v2">Add new contact</div>
                                                        Add a new supplier or a new customer
                                                    </div>
                                                    <div class="nk-iv-wg2-cta">
                                                        <a href="/add" class="btn btn-primary btn-lg btn-block">Add</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    @endcan
                                </div><!-- .row -->
                            </div><!-- .nk-block -->
                            <div class="nk-block">
                                <div class="card card-bordered">
                                    <div class="nk-refwg">
                                        <div class="nk-refwg-invite card-inner">
                                            <div class="nk-refwg-head g-3">
                                                <div class="nk-refwg-title">
                                                    <h5 class="title">Need help?</h5>
                                                    <div class="title-sub">Feel free to send me an email.</div>
                                                </div>
                                            </div>
                                            <div class="nk-refwg-url">
                                                <div class="form-control-wrap">
                                                    <div class="form-clip clipboard-init" data-clipboard-target="#refUrl" data-success="Copied" data-text="Copy Link"><em class="clipboard-icon icon ni ni-copy"></em> <span class="clipboard-text">Copy email</span></div>
                                                    <div class="form-icon">
                                                        <em class="icon ni ni-mail"></em>
                                                    </div>
                                                    <!--<input type="text" class="form-control copy-text" id="refUrl" value="bisanti.alberto.dev@gmail.com">-->
                                                    <input type="text" class="form-control copy-text" id="refUrl" value="•••••.•••••.•••••@•••••.•••">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-refwg-stats card-inner bg-lighter">

                                        </div>
                                    </div>
                                </div><!-- .card -->
                            </div><!-- .nk-block -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- content @e -->

@yield('footer_section')
