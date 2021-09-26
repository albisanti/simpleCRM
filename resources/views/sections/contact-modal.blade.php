
@if(!$edit)
<div class="container-fluid px-5 pb-5">
    <div class="row mt-3">
        <div class="col-12">
            <span class="h4">Name</span><br>
            <span class="ml-3">{{$rs->name}}</span>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <span class="h4">Company name</span><br>
            <span class="ml-3">{{$rs->company_name}}</span>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <span class="h4">Email</span><br>
            <span class="ml-3">{{$rs->email}}</span>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <span class="h4">Email 2</span><br>
            <span class="ml-3">{{$rs->email2}}</span>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <span class="h4">City</span><br>
            <span class="ml-3">{{$rs->city}}</span>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <span class="h4">Address</span><br>
            <span class="ml-3">{{$rs->address}}</span>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <span class="h4">Country</span><br>
            <span class="ml-3">{{$rs->nation}}</span>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <span class="h4">What they do</span><br>
            <span class="ml-3">{{$rs->service->name ?? ''}}</span>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <span class="h4">Rating</span><br>
            <span class="ml-3">{{$rs->rating}}</span>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <span class="h4">Notes</span><br>
            <span class="ml-3">{{$rs->notes}}</span>
        </div>
    </div>
</div>
@else
    <div class="container-fluid px-5 pb-5">
        <div class="row mt-4">
            <div class="col-12">
                <span class="h4">Name</span><br>
                <input type="text" class="form-control update ml-3" data-type="name" value="{{$rs->name}}">
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <span class="h4">Company name</span><br>
                <input type="text" class="form-control update ml-3" data-type="name" value="{{$rs->company_name}}">
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <span class="h4">Email</span><br>
                <input type="text" class="form-control update ml-3" data-type="email" value="{{$rs->email}}">
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <span class="h4">Email 2</span><br>
                <input type="text" class="form-control update ml-3" data-type="email" value="{{$rs->email2}}">
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <span class="h4">City</span><br>
                <input type="text" class="form-control update ml-3" data-type="city" value="{{$rs->city}}">
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <span class="h4">Address</span><br>
                <input type="text" class="form-control update ml-3" data-type="address" value="{{$rs->address}}">
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <span class="h4">Country</span><br>
                <input type="text" class="form-control update ml-3" data-type="nation" value="{{$rs->nation}}">
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <span class="h4">Service</span><br>
                <select class="form-control update ml-3" data-type="wtd">
                    {{!! $options !!}}
                </select>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <span class="h4">Rating</span><br>
                <input type="text" class="form-control update ml-3" data-type="rating" value="{{$rs->rating}}">
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <span class="h4">Notes</span><br>
                <input type="text" class="form-control update ml-3" data-type="notes" value="{{$rs->notes}}">
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 text-right">
                <span id="save" class="btn btn-outline-primary" data-id="{{$rs->id}}">Save</span>
            </div>
        </div>
    </div>
@endif
