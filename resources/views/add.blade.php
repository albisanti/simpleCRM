@include('layout.header')
@include('layout.footer')
@yield('header_section')
<!-- content @s -->
<div class="nk-content nk-content-lg nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-lg">
                    <div class="nk-block-head-content">
                        <div class="nk-block-head-sub"><a href="/" class="back-to"><em class="icon ni ni-arrow-left"></em><span>Back to Home</span></a></div>
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title fw-normal">Add your new contact</h2>
                        </div>
                    </div>
                </div><!-- nk-block-head -->
                <div class="nk-block invest-block">
                    <form action="/create" method="POST" class="invest-form">
                        @csrf
                        <div class="row g-gs">
                            <div class="col-lg-12">
                                @if(session('status'))
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <em>An error has occured!</em> Please try again.
                                    </div>
                                </div>
                                @endif

                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">What do you want to create?</label>
                                            <div class="form-control-wrap">
                                                <select class="form-select select2-hidden-accessible" name="type">
                                                    <option value="customer" >Customer</option>
                                                    <option value="supplier">Supplier</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Name*</label>
                                            <div class="form-control-wrap">
                                                <input type="text" placeholder="Name" class="form-control" name="name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Email*</label>
                                            <div class="form-control-wrap">
                                                <input type="email" placeholder="email@placeholder.com" class="form-control" name="email">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Address</label>
                                            <div class="form-control-wrap">
                                                <input type="text" placeholder="Address" class="form-control" name="address">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label class="form-label">City</label>
                                            <div class="form-control-wrap">
                                                <input type="text" placeholder="City" class="form-control" name="city">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label">Nation</label>
                                            <div class="form-control-wrap">
                                                <input type="text" placeholder="Nation" class="form-control" name="nation">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">What they do</label>
                                            <div class="form-control-wrap">
                                                <input type="text" placeholder="Write what they do" class="form-control" name="wtd">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label class="form-label">Notes</label>
                                            <div class="form-control-wrap">
                                                <textarea class="form-control" placeholder="Notes" name="notes"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label">Rating</label>
                                            <div class="form-control-wrap">
                                                <input type="number" min="1" max="5" id="rating" placeholder="Insert a value between 1 and 5" class="form-control" name="rating">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <small>* Required</small>
                                    </div>
                                    <div class="col-6 text-right">
                                        <button class="btn btn-lg btn-primary" type="submit">CONFIRM</button>
                                    </div>
                                </div>
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </form>
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
<!-- content @e -->
@yield('footer_section')

<script>
    $(document).ready(function(){
        $('.invest-cc-opt').on("click",function (e){
            e.preventDefault();
        })
    })
</script>
