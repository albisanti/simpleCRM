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
        z-index: 1010;
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
        <div id="inside-html" class="mt-5 pb-3" style="height: 100%; overflow: scroll">
            <div class="container-fluid px-5 pb-5">
                <div class="row mt-3">
                    <div class="col-12">
                        <span class="h4">Name</span><br>
                        <input type="text" placeholder="Name" class="form-control" id="name">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 text-right">
                        <span id="save" class="btn btn-outline-primary"">Save</span>
                    </div>
                </div>
            </div>
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
                                    <h2 class="nk-block-title fw-normal">Search service</h2>
                                </div>
                                <div class="col-4 text-right">
                                    <span class="btn btn-primary" id="openModal">Add</span>
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
                                    <form method="GET" action="/services/">
                                        <div class="form-control-wrap">
                                            <div class="input-group">
                                                <input type="search" class="form-control" placeholder="Search service" name="search" id="search" value="{{$search}}">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-primary">SEARCH</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if(count($rs)>0)
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($rs as $k => $item)
                                        <tr>
                                            <th scope="row">{{$k+1}}</th>
                                            <td>{{$item->name}}</td>
                                            <td class="text-right">
                                                @can('delete')
                                                    <em data-id="{{$item->id}}" class="icon ni ni-trash-fill delete" data-toggle="tooltip" data-placement="top" title="Delete" style="font-size: 22px"></em>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-info">
                                    <em>No service has been found!</em> Please check that "<b>{{$search}}</b>" is correct.
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
        $('#openModal').on("click",function (){
            $('#showMore').show();
        })

        $('.close-showMore').on("click",function (){
            $('#showMore').hide();
        });

        $('#save').on("click",function (){
           axios.post('add-service',{
               name: $('#name').val()
           })
            .then(res => {
                if(res.data.status === 'success'){
                    location.reload();
                } else {
                    alert(res.data.report);
                }
            })
            .catch(e => {
                console.log(e);
            })
        });

        $('.delete').on("click",function (){
            let id = $(this).attr('data-id');
            axios.post('delete-service',{
                id
            })
            .then(res => {
                if(res.data.status === 'success'){
                    location.reload();
                } else {
                    alert(res.data.report);
                }
            })
            .catch(e => {
                console.log(e);
            })
        })

    });
</script>
