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
                <span>Products</span>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Add Product</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Add Product
            <small>Add a product</small>
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


        <div class="row">
            <div class="col-md-12">
                <div class="portlet">
                    <a href="/product" class="btn red">
                        <i class="fa fa-tasks"></i> Manage Product
                    </a>
                </div>
            </div>
        </div>


        <form action="/product" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="category">Category</label>
                    <select name="category_id" id="category" class="form-control">
                        <option></option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="subcategory">Subcategory</label>
                    <select name="subcategory_id" id="subcategory" class="form-control">
                        <option></option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="weight">Weight</label>
                    <select name="weight_id" id="weight" class="form-control">
                        <option></option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="size" class="size">Size</label>
                    <select name="size_id" id="size" class="form-control">
                        <option></option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="price">Price</label>
                    <input type="text" id="price" class="form-control" placeholder="Enter the price for the product" name="price">
                </div>

                <div class="form-group col-md-6">
                    <label for="product_count">No of Products per bundle : </label>
                    <input type="number" id="product_count" class="form-control" placeholder="Enter the no of products per bundle" name="product_count">
                </div>

                <div class="form-group col-md-6">
                    <br>
                    <label>Select the type of product : </label>
                    <br>
                    <label class="mt-radio">
                        <input id="cash_radio" type="radio" name="type" value="{{ \App\Constants\ProductConstants::PRODUCT_TYPE_UNITS }}" checked>
                        Units
                    </label>

                    <label class="mt-radio">
                        <input id="cheque_radio" type="radio" name="type" value="{{ \App\Constants\ProductConstants::PRODUCT_TYPE_WEIGHT }}">
                        Weight
                    </label>
                </div>

                <!-- GROUPS SECTION -->
                <div class="form-group col-md-12">
                    <br>
                    <label>Product Rates : </label>
                    <table class="table table-bordered" id="group_list">
                        <thead>
                            <tr class="text-center">
                                <th>Group</th>
                                <th>Distributor Qty :</th>
                                <th>Distributor Commission : </th>
                                <th>SubDistributor Qty :</th>
                                <th>SubDistributor Commission : </th>
                                <th>Discount Rate</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Fetching the list of groups
                                $request = Request::create('/api/groups/all', 'GET');
                                $groups = json_decode(Route::dispatch($request)->getContent(), true);
                             ?>
                            <!-- CHECKING IF THE GROUPS ARE PRESENT OR NOT -->
                            @if(sizeof($groups) > 0)
                                <!-- ITERATING TRHOUGH ALL GROUPS -->
                                <?php
                                    for($i=0;$i<sizeof($groups);$i++) {
                                ?>
                                    <tr>
                                        <td>
                                            <label>{!! $groups[$i]['text'] !!}</label>
                                        </td>
                                        <td>
                                            <input type="text" name="distributors_rate[]" class="form-control" placeholder="Distributor Qty : ">
                                        </td>
                                        <td>
                                            <input type="text" name="distributors_commission[]" class="form-control" placeholder="Distributor commission : ">
                                        </td>
                                        <td>
                                            <input type="text" name="subdistributors_rate[]" class="form-control" placeholder="SubDistributor Qty : ">
                                        </td>
                                        <td>
                                            <input type="text" name="subdistributors_commission[]" class="form-control" placeholder="SubDistributor commission : ">
                                        </td>
                                        <td>
                                            <input type="text" name="groups_rate[]" class="form-control" placeholder="Discount rate : ">
                                            <input type="hidden" name="groups_id[]" value="{!! $groups[$i]['id'] !!}">
                                        </td>
                                    </tr>
                                <?php
                                    }
                                ?>
                                <!-- END OF ITERATION -->
                            @else
                                <tr>
                                    <td colspan="2" class="text-center"> No groups present. Please add some groups</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="text-right">
                <button id="add-product" type="submit" name="add-product" class="btn red">
                    Add Product
                </button>
                <br><br>
            </div>
        </form>
    </div>

@endsection

@section ('custom-script')

    <script>
        $('#category').select2({
            placeholder: "Select a category",
            ajax: {
                url: '/api/product/category/select-list',
                dataType: 'json'
            }
        });
        $('#size').select2({
            placeholder: "Select a size",
            ajax: {
                url: '/api/product/size/select-list',
                dataType: 'json'
            }
        });
        $('#weight').select2({
            placeholder: "Select a weight",
            ajax: {
                url: '/api/product/weight/select-list',
                dataType: 'json'
            }
        });
        $('#subcategory').select2({
            placeholder: "Select a subcategory",
            ajax: {
                url: '/api/product/subcategory/select-list',
                dataType: 'json'
            }
        });
    </script>


    @if(session()->has('success') || session()->has('error'))
        <script>
            var title = "";
            var message = "";
            var type = "";
        </script>
        @if(session()->has('success'))
            <script>
                type = "success";
            </script>
            @switch(session('success'))
                @case('store')
                <script>
                    title = "Product Added Successfully";
                    message = "The given product has been successfully added.";
                </script>
                @break
            @endswitch
            {{ Session::forget('success') }}
        @endif

        @if(session()->has('error'))
            <script>
                type = "danger";
            </script>
            @switch(session('error'))
                @case('store')
                <script>
                    title = "Failed To Add Product";
                    message = "The given product was failed while adding.";
                </script>
                @break
            @endswitch
            {{ Session::forget('error') }}
        @endif

        <script>
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr[type](message, title);
        </script>
    @endif
@endsection
