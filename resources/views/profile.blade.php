@include('layout.header')
@include('layout.footer')
@yield('header_section')

<div class="nk-content nk-content-lg nk-content-fluid mt-5">
    <div class="container-xl wide-lg">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-lg">
                    <div class="nk-block-head-content">
                        <div class="nk-block-head-sub"><a href="/" class="back-to"><em class="icon ni ni-arrow-left"></em><span>Back to Home</span></a></div>
                        <div class="nk-block-head-content">
                            <div class="row">
                                <div class="col-8">
                                    <h2 class="nk-block-title fw-normal">Your profile</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- nk-block-head -->

                <div class="alert alert-info">
                    <b>Information</b> If you want to change your email address or your name, please contact the administrator of the platform.
                </div>

                <div class="nk-block invest-block">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-12">
                                    <b>Change password</b>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <span>Your password:</span>
                                <input type="password" id="password" class="form-control">
                            </div>
                            <div class="row mt-3">
                                <span>Your new password:</span>
                                <input type="password" id="newPassword" class="form-control">
                            </div>
                            <div class="row mt-3">
                                <span>Repeat your new password:</span>
                                <input type="password" id="repeatPassword" class="form-control">
                            </div>
                            <div class="row text-right mt-3">
                                <div class="col-12 text-right">
                                    <span class="btn btn-danger" id="changePassword" style="background: darkred">Change password</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

@yield('footer_section')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    $(document).ready(function(){
       $('#changePassword').on("click",function (){
            if($('#password').val() !== ''){
                if($('#newPassword').val() === $('#repeatPassword').val()){
                    axios.post('/change-password',{
                        password: $('#password').val(),
                        newPassword: $('#newPassword').val()
                    })
                    .then(res => {
                        if(res.data.status === 'success') {
                            alert("Password changed correctly");
                            location.reload();
                        } else {
                            alert(res.data.report);
                        }
                    })
                    .catch(e => {
                        console.log(e);
                    })
                } else {
                    alert('The password are different');
                }
            } else {
                alert("Your password can not be empty");
            }
       });
    });
</script>
