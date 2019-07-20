@extends('layout')

@section('page-content')
    <div class="page-bar">
        <!-- BREADCRUMBS SECTION -->
        <ul class="page-breadcrumb">
            <li>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Suppliers</span>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Manage Suppliers</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Supplier
            <small>Manage your suppliers</small>
        </h3>
        <!-- END PAGE TITLE-->

        <!-- ALERTS SECTION -->
        <!-- ERRORS SECTION -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- END OF ERRORS SECTION -->
        <!-- END OF ALERT SECTION -->


        <div class="row">
            <div class="col-md-12">
                <div class="portlet">
                    <button class="btn red" data-toggle='modal' data-target='#addModal'>
                        <i class="fa fa-plus"></i> Add Supplier
                    </button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-user font-red"></i>
                            <span class="caption-subject font-red sbold uppercase">Suppliers</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-hover table-bordered" id="supplier_list">
                            <thead>
                            <tr class="text-center">
                                <th> Name </th>
                                <th> Email </th>
                                <th> Phone Number </th>
                                <th> Edit </th>
                                <th> Delete </th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!------------------------------------------------------------------------------------>
    <!--                                MODAL SECTION                                   -->
    <!------------------------------------------------------------------------------------>

    <!-- ADD MODAL -->

    <div class="modal fade" tabindex="-1" role="dialog" id="addModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add Supplier</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <form action="/supplier" method="POST">
                            @csrf
                            <div class="form-body">
                                <!-- START OF MODAL BODY -->
                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">Supplier Name
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" id="add_supplier_name" name="name" class="form-control"
                                               placeholder="Enter the Supplier Name : "/></div>
                                </div>
                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">Email
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" id="add_supplier_email" name="email" class="form-control"
                                               placeholder="Enter the Email : "/></div>
                                </div>
                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">Phone
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="tel" id="add_supplier_phone_number" name="phone" class="form-control"
                                               placeholder="Enter the Phone Number : "/></div>
                                </div>

                                <!-- END OF MODAL BODY -->

                                <!-- MODAL FOOTER -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button id="edit_save" type="submit" name="edit_supplier" class="btn btn-primary">
                                        Add Supplier
                                    </button>
                                </div>
                                <!-- END OF MODAL FOOTER -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--END OF ADD BUTTON MODAL-->

    <!-- EDIT MODAL -->

    <div class="modal fade" tabindex="-1" role="dialog" id="editModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Supplier</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <form action="/supplier" id="edit_form" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <!-- START OF MODAL BODY -->
                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">Supplier Name
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" id="edit_supplier_name" name="name" class="form-control"
                                               placeholder="Enter the Supplier Name : "/></div>
                                </div>
                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">Email
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" id="edit_supplier_email" name="email" class="form-control"
                                               placeholder="Enter the Email : "/></div>
                                </div>
                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">Phone
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="tel" id="edit_supplier_phone_number" name="phone" class="form-control"
                                               placeholder="Enter the Phone Number : "/></div>
                                </div>
                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">Address
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" id="edit_supplier_address" name="address" class="form-control"
                                               placeholder="Enter the Address : "/></div>
                                </div>
                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">Bank Name
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" id="edit_bank_name" name="bank_name" class="form-control"
                                               placeholder="Enter the Bank Name : "/></div>
                                </div>
                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">Gst No
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" id="edit_gst_No" name="gst_no" class="form-control"
                                               placeholder="Enter the GST No : "/></div>
                                </div>

                                <!-- END OF MODAL BODY -->

                                <!-- MODAL FOOTER -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button id="edit_save" type="submit" name="edit_supplier" class="btn btn-primary">
                                        Save changes
                                    </button>
                                </div>
                                <!-- END OF MODAL FOOTER -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--END OF EDIT BUTTON MODAL-->

    <!-- DELETE MODAL -->

    <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete Supplier</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <form action="/supplier/" id="delete_form" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="form-body">
                                <!-- START OF MODAL BODY -->
                                <div class="container">
                                    <label>Are you sure you want to delete the supplier ?</label>
                                </div>

                                <!-- END OF MODAL BODY -->

                                <!-- MODAL FOOTER -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button id="delete_save" type="submit" name="delete_supplier" class="btn btn-primary">
                                        Delete
                                    </button>
                                </div>
                                <!-- END OF MODAL FOOTER -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--END OF EDIT BUTTON MODAL-->


@endsection

@section ('custom-script')
    <!------------------------------------------------------------------------------------>
    <!--                          DATA-TABLES SECTION                                   -->
    <!------------------------------------------------------------------------------------>
    <script>
        var supplierTable = $('#supplier_list');
        supplierTable.DataTable({
            processing: true,
            serverSide: true,
            ajax: '/supplier/get-suppliers',
            columns: [
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'phone_number', name: 'phone_number'},
                {data: 'edit', name: 'edit'},
                {data: 'delete', name: 'delete'}
            ]
        });
        supplierTable.on('click', '.edit', function (e) {
            $id = $(this).attr('id');
            $("#edit_category_id").val($id);
            //fetching all other values from database using ajax and loading them onto their respective edit fields!
            //alert($id); to print for checking
            $.ajax({
                url:"/supplier/" + $id,
                method: "GET",
                dataType: "json",
                success: function(data){
                    $("#edit_supplier_name").val(data.name);
                    $("#edit_supplier_email").val(data.email);
                    $("#edit_supplier_phone_number").val(data.phone_number);
                    $("#edit_supplier_address").val(data.address);
                    $("#edit_bank_name").val(data.bank_name);
                    $("#edit_gst_No").val(data.gst_no);
                    $('#edit_form').attr('action', '/supplier/'+$id);
                    $("#editModal").modal('show');
                },
            });
        });

        supplierTable.on('click', '.delete', function(e) {
            $id = $(this).attr('id');
            $('#delete_supplier_id').val($id);
            $('#delete_form').attr('action', '/supplier/'+$id);
        })
    </script>


@endsection
