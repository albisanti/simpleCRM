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

    a{
        text-decoration: underline;
    }

</style>

<div id="showMore">
    <div id="internal-showMore">
        <div class="close-showMore">
            Close <em class="icon ni ni-cross"></em>
        </div>
        <div id="inside-html" class="mt-5 pb-3" style="height: 100%; overflow: scroll">

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
                                    <h2 class="nk-block-title fw-normal">Search {{$type}}</h2>
                                </div>
                                @can('export')
                                <div class="col-4 text-right">
                                    <span class="btn btn-primary" data-url="{{$type}}" id="export">Export</span>
                                </div>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div><!-- nk-block-head -->
                <div class="nk-block invest-block">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-12">
                                    <form method="GET" action="/{{$type}}s/">
                                        <div class="form-control-wrap">
                                            <div class="input-group">
                                                <input type="search" class="form-control" placeholder="Search {{$type}}" name="search" id="search" value="{{$search}}">
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
                                    <th scope="col">Email</th>
                                    <th scope="col">City / Address</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($rs as $k => $item)
                                        <tr>
                                            <th scope="row">{{$k+1}}</th>
                                            <td>
                                                {{$item->name}}<br>
                                                <small class="text-muted">{{$item->company_name}}</small>
                                            </td>
                                            <td>
                                                {{$item->email}} <br>
                                                @if (strpos($item->website,'http') !== false)
                                                <a class="text-muted" href="{{$item->website}}" target="_blank">{{$item->website}}</a>
                                                @else
                                                <a class="text-muted" href="http://{{$item->website}}" target="_blank">{{$item->website}}</a>
                                                @endif
                                            </td>
                                            <td>
                                                {{$item->city}}<br>
                                                <small>{{$item->address}}</small>
                                            </td>
                                            <td class="text-right">
                                                @can('delete')
                                                <em data-id="{{$item->id}}" class="icon ni ni-trash-fill delete" data-toggle="tooltip" data-placement="top" title="Delete" style="font-size: 22px"></em>
                                                @endcan
                                                @can('create')
                                                <i data-id="{{$item->id}}" data-edit="y" class="ni ni-edit-alt pointer details" data-toggle="tooltip" data-placement="top" title="Edit" style="font-size: 18px"></i>
                                                @endcan
                                                <em data-id="{{$item->id}}" data-edit="n" class="icon ni ni-arrow-right-circle-fill details" data-toggle="tooltip" data-placement="top" title="Show more" style="font-size: 22px"></em>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                                <div class="alert alert-info">
                                    <em>No {{$type}}s has been found!</em> Please check that "<b>{{$search}}</b>" is correct.
                                </div>
                            @endif
                            {{$rs->links('layout.pagination')}}
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

        $('#export').on("click",function (){
            let urlType = $(this).attr('data-url');
            location.href = '/export/'+urlType+'?search='+$('#search').val();
        });

       $('.details').on("click",function (){
           let id = $(this).attr('data-id');
           let edit = $(this).attr('data-edit');
            axios.post('/query',{
                id,
                edit
            }).then(res => {
                console.log(res);
                if(res.data.status == 'success'){
                    $('#inside-html').html(res.data.html);
                    $('#showMore').show();
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: res.data.report,
                        icon: "error",
                        confirmButtonText: 'Ok'
                    });
                }
            }).catch(e => {
                alert("Unexpected error");
                console.log(e);
            });
       });

       $('.close-showMore').on("click",function (){
           $('#showMore').hide();
       });

        $('body').on("click",'#save',function (e){
           let id = $(this).attr('data-id');
           let datas = {
               id: id
           };

           $('.update').each(function(){
               datas[$(this).attr('data-type')] = $(this).val()
           })

           axios.post('/update',{
               datas
           }).then(res => {
               if(res.data.status == 'success') {
                   Swal.fire({
                       title: 'Success!',
                       text: "Contact updated succesfully!",
                       icon: "success",
                       confirmButtonText: 'Reload the page'
                   });
                   location.reload();
               } else {
                   Swal.fire({
                       title: 'Error!',
                       text: res.data.report,
                       icon: "error",
                       confirmButtonText: 'Ok'
                   });
               }
           }).catch(e => {
               alert("Unexpected error");
               console.log(e);
           })
        });

        //Delete
        $('.delete').on("click",function (){
           let id = $(this).attr('data-id');
           axios.post('/delete',{
               id
           }).then(res => {
                if(res.data.status == 'success') {
                    location.reload();
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: res.data.report,
                        icon: "error",
                        confirmButtonText: 'Ok'
                    });
                }
           }).catch(e => {
               alert("Unexpected error");
               console.log(e);
           })
        });


    });
</script>
