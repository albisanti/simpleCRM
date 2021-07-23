
@if(!$edit)
    <div class="container-fluid px-5">
        <div class="row mt-3">
            <div class="col-12">
                <span class="h4">Name</span><br>
                <span class="ml-3">{{$rs->name}}</span>
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
                <span class="h4">Created at</span><br>
                <span class="ml-3">{{$rs->created_at}}</span>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <span class="h4">Updated at</span><br>
                <span class="ml-3">{{$rs->updated_at}}</span>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <span class="h4">Permissions</span><br>
                <input type="checkbox" name="delete" readonly disabled> Delete Customer/Supplier <br>
                <input type="checkbox" name="delete" readonly disabled> Add Customer/Supplier <br>
            </div>
        </div>
    </div>
@else
    <div class="container-fluid px-5">
        <div class="row mt-4">
            <div class="col-12">
                <span class="h4">Name</span><br>
                <input type="text" class="form-control ml-3" value="{{$rs->name}}">
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <span class="h4">Email</span><br>
                <input type="text" class="form-control ml-3" value="{{$rs->email}}">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <span class="h4">Permissions</span><br>
                <input type="checkbox" name="delete" id="delete"> <label for="delete">Delete Customer/Supplier</label> <br>
                <input type="checkbox" name="add" id="add"> <label for="add">Add Customer/Supplier</label> <br>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 text-right">
                <span id="save" class="btn btn-outline-primary" data-id="{{$rs->id}}">Save</span>
            </div>
        </div>
    </div>
@endif
