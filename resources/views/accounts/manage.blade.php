@include('layout.header')
@include('layout.footer')
@yield('header_section')
<style>
    .pointer{
        cursor: pointer;
    }

    #showMore{
        height: 100vh;
        width: 100vw;
        background-color: rgba(51,51,51,.7);
        position: absolute;
        z-index: 9999;
        display: none;
    }

    #internal-showMore{
        height: 100%;
        width: 60vw;
        background: white;
        position: fixed;
        top: 0;
        right: 0;
    }

    .close-showMore{
        position: absolute;
        top: 20px;
        right: 20px;
        cursor: pointer;
    }
</style>

<div id="showMore">
    <div id="internal-showMore">
        <div class="close-showMore">
            Close <em class="icon ni ni-cross"></em>
        </div>
        <div id="inside-html" class="mt-5">

        </div>
    </div>
</div>

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
                                    <h2 class="nk-block-title fw-normal">Manage account</h2>
                                </div>
                                <div class="col-4 text-right">
                                    <span class="btn btn-primary" id="addNewUser">Add</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- nk-block-head -->
                <div class="nk-block invest-block">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-12">
                                    <b>Accounts</b>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if(count($rs ?? array())>0)
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Created at</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($rs as $k => $item)
                                        <tr>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>
                                                {{$item->created_at}}
                                            </td>
                                            <td class="text-right">
                                                @if(\Illuminate\Support\Facades\Auth::user()->id !== $item->id)
                                                <em data-id="{{$item->id}}" class="icon ni ni-trash-fill delete" data-toggle="tooltip" data-placement="top" title="Delete" style="font-size: 22px"></em>
                                                <i data-id="{{$item->id}}" data-edit="y" class="ni ni-edit-alt pointer details" data-toggle="tooltip" data-placement="top" title="Edit" style="font-size: 18px"></i>
                                                <em data-id="{{$item->id}}" data-edit="n" class="icon ni ni-arrow-right-circle-fill details" data-toggle="tooltip" data-placement="top" title="Show more" style="font-size: 22px"></em>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-info">
                                    <em>No accounts has been found!</em>
                                </div>
                            @endif
                        </div>
                    </div>
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>

@yield('footer_section')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    $(document).ready(function(){

        $('#addNewUser').on("click",function (){
            axios.post('/account-detail',{
                new: true
            }).then(res => {
                console.log(res);
                if(res.data.status == 'success'){
                    $('#inside-html').html(res.data.html);
                    $('#showMore').show();
                }
            }).catch(e => {
                console.log(e);
            });
        });

        $('.details').on("click",function (){
            let id = $(this).attr('data-id');
            let edit = $(this).attr('data-edit');
            axios.post('/account-detail',{
                id,
                edit,
                new: false
            }).then(res => {
                console.log(res);
                if(res.data.status == 'success'){
                    $('#inside-html').html(res.data.html);
                    $('#showMore').show();
                }
            }).catch(e => {
                console.log(e);
            });
        });

        $('.delete').on("click",function (){
            let id = $(this).attr('data-id');
            axios.post('/delete-account',{
                id
            }).then(res => {
                console.log(res);
                if(res.data.status == 'success'){
                    location.reload();
                }
            }).catch(e => {
                console.log(e);
            });
        });

        $('.close-showMore').on("click",function (){
            $('#showMore').hide();
        })

        $('body').on("click",'#saveNew',function (){
            axios.post('/create-account',{
                name: $('#name').val(),
                email: $('#email').val(),
                password: $('#password').val(),
                delete: $('#delete').is(':checked') ? 'y' : 'n',
                create: $('#add').is(':checked') ? 'y' : 'n',
                export: $('#export').is(':checked') ? 'y' : 'n'
            }).then(res => {
                if(res.data.status == 'success') {
                    location.reload();
                } else {
                    alert("Error while creating a new User. Please try again in a few seconds");
                }
            })
            .catch(e => {
                console.log(e);
            })
        });

        $('body').on("click",'#save',function (){
            let id = $(this).attr('data-id');
            axios.post('/edit-account',{
                id,
                name: $('#name').val(),
                email: $('#email').val(),
                password: $('#password').val(),
                delete: $('#delete').is(':checked') ? 'y' : 'n',
                create: $('#add').is(':checked') ? 'y' : 'n',
                export: $('#export').is(':checked') ? 'y' : 'n'
            }).then(res => {
                if(res.data.status == 'success') {
                    location.reload();
                } else {
                    alert("Error while creating a new User. Please try again in a few seconds");
                }
            })
                .catch(e => {
                    console.log(e);
                })
        });

    });
</script>
