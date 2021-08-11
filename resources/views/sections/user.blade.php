@if(!$new)
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
                    @if($rs->can('delete'))
                        <input type="checkbox" name="delete" id="delete" checked readonly disabled> <label for="delete">Delete Customer/Supplier</label> <br>
                    @else
                        <input type="checkbox" name="delete" id="delete" readonly disabled> <label for="delete">Delete Customer/Supplier</label> <br>
                    @endif

                    @if($rs->can('create'))
                        <input type="checkbox" name="add" id="add" checked readonly disabled> <label for="add">Add Customer/Supplier</label> <br>
                    @else
                        <input type="checkbox" name="add" id="add" readonly disabled> <label for="add">Add Customer/Supplier</label> <br>
                    @endif

                    @if($rs->can('export'))
                        <input type="checkbox" name="export" id="export" checked readonly disabled> <label for="export">Export</label> <br>
                    @else
                        <input type="checkbox" name="export" id="export" readonly disabled> <label for="export">Export</label> <br>
                    @endif
                </div>
            </div>
        </div>
    @else
        <div class="container-fluid px-5">
            <div class="row mt-4">
                <div class="col-12">
                    <span class="h4">Name</span><br>
                    <input type="text" class="form-control ml-3" id="name" value="{{$rs->name}}">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <span class="h4">Email</span><br>
                    <input type="text" class="form-control ml-3" id="email" value="{{$rs->email}}">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <span class="h4">Password</span>
                    <span class="sub-text"><em class="icon ni ni-help"></em> Leave empty if you don't want to edit the password.</span>
                    <input type="password" class="form-control ml-3" id="password" value="">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <span class="h4">Permissions</span><br>
                    @if($rs->can('delete'))
                        <input type="checkbox" name="delete" id="delete" checked> <label for="delete">Delete Customer/Supplier</label> <br>
                    @else
                        <input type="checkbox" name="delete" id="delete"> <label for="delete">Delete Customer/Supplier</label> <br>
                    @endif

                    @if($rs->can('create'))
                        <input type="checkbox" name="add" id="add" checked> <label for="add">Add Customer/Supplier</label> <br>
                    @else
                        <input type="checkbox" name="add" id="add"> <label for="add">Add Customer/Supplier</label> <br>
                    @endif

                    @if($rs->can('export'))
                        <input type="checkbox" name="export" id="export" checked> <label for="export">Export</label> <br>
                    @else
                        <input type="checkbox" name="export" id="export"> <label for="export">Export</label> <br>
                    @endif
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-right">
                    <span id="save" class="btn btn-outline-primary" data-id="{{$rs->id}}">Save</span>
                </div>
            </div>
        </div>
    @endif
@else
    <div class="container-fluid px-5">
        <div class="row mt-4">
            <div class="col-12">
                <span class="h4">Name</span><br>
                <input type="text" class="form-control ml-3" value="" id="name">
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <span class="h4">Email</span><br>
                <input type="text" class="form-control ml-3" value="" id="email">
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <span class="h4">Password</span><br>
                <input type="password" class="form-control ml-3" value="" id="password">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <span class="h4">Permissions</span><br>

                <input type="checkbox" name="delete" id="delete"> <label for="delete">Delete Customer/Supplier</label> <br>

                <input type="checkbox" name="add" id="add"> <label for="add">Add Customer/Supplier</label> <br>

                <input type="checkbox" name="export" id="export"> <label for="export">Export</label> <br>

            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 text-right">
                <span id="saveNew" class="btn btn-outline-primary">Save</span>
            </div>
        </div>
    </div>
@endif
