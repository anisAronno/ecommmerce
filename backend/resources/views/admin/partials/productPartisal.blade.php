<div id="mainDivProducts" class="container-fluid d-none">
    <div class="row">
        <div class="col-md-12 p-3">
            {{-- <button id="addBtnproduct" class="btn btn-sm btn-danger my-3">Add
                New</button> --}}

            <button id="addBtnproduct" type="button" class="btn btn-danger" data-toggle="modal"
                data-target="#exampleModalPreview">
                Add New
            </button>


            <table id="productDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Sl.</th>
                        <th class="th-sm">Title</th>
                        <th class="th-sm">Price</th>
                        <th class="th-sm">Offer</th>
                        <th class="th-sm">Quantity</th>
                        <th class="th-sm">Category</th>
                        <th class="th-sm">Brand</th>
                        <th class="th-sm">Status</th>
                        <th class="th-sm">View</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                    </tr>
                </thead>
                <tbody id="product_table">
                </tbody>
            </table>

        </div>
    </div>
</div>
<div id="loadDivProducts" class="container">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <img class="loding-icon m-5" src="{{ asset('loader.svg') }}" alt="">
        </div>
    </div>
</div>
<div id="wrongDivProducts" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5 text-center">
            <h3>Something Went Wrong!</h3>
        </div>
    </div>
</div>

<!-- Products add -->

<!-- Modal -->

<div class="modal fade right" id="addProductModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
    <div class="modal-dialog-full-width modal-dialog momodel modal-fluid" role="document">
        <div class="modal-content-full-width modal-content ">
            <div class=" modal-header-full-width   modal-header text-center">
                <h5 class="modal-title w-100" id="exampleModalPreviewLabel">Material Design Full Screen Modal</h5>
                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                    <span style="font-size: 1.3em;" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <input id="pdName" type="text" id="" class="form-control mb-3" placeholder="Product Name">
                            <textarea id="pdDescription" type="text" id="" class="form-control mb-3"
                                placeholder="Product Description" cols="30" rows="5"></textarea>
                            <input id="pdPrice" type="number" id="" class="form-control mb-3"
                                placeholder="Product Price">
                            <input id="pdOffer" type="number" id="" class="form-control mb-3" placeholder="Offer Price">
                            <input id="pdQuantity" type="number" id="" class="form-control mb-3"
                                placeholder="Product Quantity">
                            <select id="pdCategory" style="margin-bottom: 10px;" class="browser-default custom-select">
                            </select>
                            <select id="pdBrand" style="margin-bottom: 10px;" class="browser-default custom-select">
                            </select>

                            <select id="pdStock" style="margin-bottom: 10px;" class="browser-default custom-select">
                                <option value="1" selected>Stock In</option>
                                <option value="0">Stock Out</option>
                            </select>

                            <div class="form-group">
                                <label for="pdFeature">Product Feature ? </label>
                                <select id="pdFeature" style="margin-bottom: 10px;"
                                    class="browser-default custom-select">
                                    <option value="1">Yes</option>
                                    <option value="0" selected>No</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="pdFeature">Product Status: </label>
                                <select id="pdActive" style="margin-bottom: 10px;"
                                    class="browser-default custom-select">
                                    <option value="1" selected>Publish</option>
                                    <option value="0">Panding</option>
                                </select>
                            </div>

                            <select id="pdmeserment" style="margin-bottom: 10px;" class="browser-default custom-select">
                                <option selected>Select Meserment</option>
                                <option value="1">Size</option>
                                <option value="2">Wight</option>
                                <option value="3">Dimention</option>
                            </select>

                            <div class="meserment_input">

                            </div>





                        </div>
                        <div class="col-md-6">

                            <div class="card">
                                <div class="card-header p-2 font-weight-bold text-center border border-dark">
                                    Product Images
                                </div>
                                <div class="card-body p-0">
                                    <table cellpadding="10px">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Preview</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-center">
                                                <td>
                                                    <input type="file" id="productImageOne" class="form-control mb-3"
                                                        name="productImage[]">
                                                </td>
                                                <td>
                                                    <img id="productImageOnePreview"
                                                        style="height: 100px !important; width: 200px !important;"
                                                        class="imgPreview mx-auto"
                                                        src="{{ asset('/admin/images/default-image.png') }}" />
                                                </td>
                                            </tr>
                                            <tr class="text-center">
                                                <td>
                                                    <input type="file" id="productImageTwo" class="form-control mb-3"
                                                        name="productImage[]">
                                                </td>
                                                <td>
                                                    <img id="productImageTwoPreview"
                                                        style="height: 100px !important; width: 200px !important;"
                                                        class="imgPreview mx-auto"
                                                        src="{{ asset('/admin/images/default-image.png') }}" />
                                                </td>
                                            <tr class="text-center">
                                                <td>
                                                    <input type="file" id="productImageThree" class="form-control mb-3"
                                                        name="productImage[]">
                                                </td>
                                                <td>
                                                    <img id="productImageThreePreview"
                                                        style="height: 100px !important; width: 200px !important;"
                                                        class="imgPreview mx-auto"
                                                        src="{{ asset('/admin/images/default-image.png') }}" />
                                                </td>
                                            <tr class="text-center">
                                                <td>
                                                    <input type="file" id="productImageFour" class="form-control mb-3"
                                                        name="productImage[]">
                                                </td>
                                                <td>
                                                    <img id="productImageFourPreview"
                                                        style="height: 100px !important; width: 200px !important;"
                                                        class="imgPreview mx-auto"
                                                        src="{{ asset('/admin/images/default-image.png') }}" />
                                                </td>
                                            <tr class="text-center">
                                                <td>
                                                    <input type="file" id="productImageFive" class="form-control mb-3"
                                                        name="productImage[]">
                                                </td>
                                                <td>
                                                    <img id="productImageFivePreview"
                                                        style="height: 100px !important; width: 200px !important;"
                                                        class="imgPreview mx-auto"
                                                        src="{{ asset('/admin/images/default-image.png') }}" />
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="card mt-2">
                                <div class="card-header">
                                    <h5>Add Color</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <table class="table table-border table-sm">
                                            <thead class="thead-success">
                                                <th class="text-center">Serial</th>
                                                <th class="text-center">Input</th>
                                                <th class="text-center">
                                                    <button onclick="addInput();" class="btn btn-warning btn-sm p-o mx-auto"><i class="fas fa-plus-circle fa-2x"></i></button>
                                                </th>
                                            </thead>
                                            <tbody id="append_tbody">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer-full-width  modal-footer">
                <button type="button" class="btn btn-danger btn-md btn-rounded" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-md btn-rounded" id="productAddConfirmBtn">Save
                    changes</button>
            </div>
        </div>
    </div>
</div>



<!-- Modal Delete -->
<div class="modal fade" id="productModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body p-3 text-center">
                <h5 class="mt-4">Do you want to Delete</h5>
                <h5 id="productDeleteId" class="mt-4 d-none"></h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
                <button data-id="" id="confirmDeleteproduct" type="button" class="btn btn-sm btn-danger">Yes</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Delete -->









<!--View  Modal -->

<div class="modal fade right" id="viewProductModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
    <div class="modal-dialog-full-width modal-dialog momodel modal-fluid" role="document">
        <div class="modal-content-full-width modal-content ">
            <div class=" modal-header-full-width   modal-header text-center">
                <h5 class="modal-title w-100" id="exampleModalPreviewLabel">Material Design Full Screen Modal</h5>
                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                    <span style="font-size: 1.3em;" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 id="productsViewId" class="mt-4 d-none"></h5>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Product Name</td>
                                    <td id="pdNameShow"></td>
                                </tr>
                                <tr>
                                    <td>Product Description</td>
                                    <td id="pdDesShow"></td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td id="pdPriceShow"></td>
                                </tr>
                                <tr>
                                    <td>Selling Price</td>
                                    <td id="pdSellPrice"></td>
                                </tr>
                                <tr>
                                    <td>Product Quantity</td>
                                    <td id="product_quantity"></td>
                                </tr>
                                <tr>
                                    <td>Category Name</td>
                                    <td id="product_category_id"></td>
                                </tr>

                                <tr>
                                    <td>Brand Name</td>
                                    <td id="product_brand_id"></td>
                                </tr>

                                <tr>
                                    <td>Owner Name</td>
                                    <td id="product_owner_id">

                                    </td>
                                </tr>
                                <tr>
                                    <td>Product Color</td>
                                    <td id="">
                                        <ul id="product_if_has_color" style="list-style-type: none; display:flex"></ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Product Measurement </td>
                                    <td >
                                        <ul id="product_meserment_type" style="list-style-type: none; display:flex"></ul>
                                    </td>
                                </tr>

                            </table>

                        </div>
                        <div class="col-md-6">

                                <div class="card">
                                    <div class="card-headr text-center pt-2">
                                       <h4>Product images</h4>
                                    </div>
                                    <div class="card-body ImageView">`

                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="modal fade right" id="updateProductModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
    <div class="modal-dialog-full-width modal-dialog momodel modal-fluid" role="document">
        <div class="modal-content-full-width modal-content ">
            <div class=" modal-header-full-width   modal-header text-center">
                <h5 class="modal-title w-100" id="exampleModalPreviewLabel">Material Design Full Screen Modal</h5>
                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                    <span style="font-size: 1.3em;" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 id="productEditId" class="mt-4 d-none"></h5>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <input id="pdEditName" type="text" id="" class="form-control mb-3"
                                placeholder="Product Name">
                            <textarea id="pdEditDescription" type="text" id="" class="form-control mb-3"
                                placeholder="Product Description" cols="30" rows="5"></textarea>
                            <input id="pdEditPrice" type="number" id="" class="form-control mb-3"
                                placeholder="Product Price">
                            <input id="pdEditOffer" type="number" id="" class="form-control mb-3" placeholder="Offer Price">
                            <input id="pdEditQuantity" type="number" id="" class="form-control mb-3"
                                placeholder="Product Quantity">
                            <select id="pdEditCategory" style="margin-bottom: 10px;"
                                class="browser-default custom-select">
                            </select>
                            <select id="pdEditBrand" style="margin-bottom: 10px;" class="browser-default custom-select">
                            </select>

                            <select id="pdEditStock" style="margin-bottom: 10px;" class="browser-default custom-select">
                                <option value="1" >Stock In</option>
                                <option value="0">Stock Out</option>
                            </select>


                            <div class="form-group">
                                <label for="pdEditFeature">Product Feature ? </label>
                                <select id="pdEditFeature" style="margin-bottom: 10px;"
                                    class="browser-default custom-select">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="pdEditStatus">Product Status: </label>
                                <select id="pdEditStatus" style="margin-bottom: 10px;"
                                    class="browser-default custom-select">
                                    <option value="1" >Publish</option>
                                    <option value="0">Panding</option>
                                </select>
                            </div>


                        </div>
                        <div class="col-md-6">

                            <div class="card">
                                <div class="card-header p-2 font-weight-bold text-center border border-dark">
                                    Product Images
                                </div>
                                <div class="card-body p-0">
                                    <table border="2" cellpadding="10px">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Preview</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-center">
                                                <td>
                                                    <input type="file" id="productEditImageOne"
                                                        class="form-control mb-3" name="productEditImage[]">
                                                </td>
                                                <td>
                                                    <img id="productEditImageOnePreview"
                                                        style="height: 100px !important; width: 200px !important;"
                                                        class="imgPreview mx-auto"
                                                        src="{{ asset('/admin/images/default-image.png') }}" />
                                                </td>
                                            </tr>
                                            <tr class="text-center">
                                                <td>
                                                    <input type="file" id="productEditImageTwo"
                                                        class="form-control mb-3" name="productEditImage[]">
                                                </td>
                                                <td>
                                                    <img id="productEditImageTwoPreview"
                                                        style="height: 100px !important; width: 200px !important;"
                                                        class="imgPreview mx-auto"
                                                        src="{{ asset('/admin/images/default-image.png') }}" />
                                                </td>
                                            <tr class="text-center">
                                                <td>
                                                    <input type="file" id="productEditImageThree"
                                                        class="form-control mb-3" name="productEditImage[]">
                                                </td>
                                                <td>
                                                    <img id="productEditImageThreePreview"
                                                        style="height: 100px !important; width: 200px !important;"
                                                        class="imgPreview mx-auto"
                                                        src="{{ asset('/admin/images/default-image.png') }}" />
                                                </td>
                                            <tr class="text-center">
                                                <td>
                                                    <input type="file" id="productEditImageFour"
                                                        class="form-control mb-3" name="productImage[]">
                                                </td>
                                                <td>
                                                    <img id="productImageEditFourPreview"
                                                        style="height: 100px !important; width: 200px !important;"
                                                        class="imgPreview mx-auto"
                                                        src="{{ asset('/admin/images/default-image.png') }}" />
                                                </td>
                                            <tr class="text-center">
                                                <td>
                                                    <input type="file" id="productEditImageFive"
                                                        class="form-control mb-3" name="productEditImage[]">
                                                </td>
                                                <td>
                                                    <img id="productImageEditFivePreview"
                                                        style="height: 100px !important; width: 200px !important;"
                                                        class="imgPreview mx-auto"
                                                        src="{{ asset('/admin/images/default-image.png') }}" />
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer-full-width  modal-footer">
                <button type="button" class="btn btn-danger btn-md btn-rounded" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-md btn-rounded" id="productEditConfirmBtn">Save
                    changes</button>
            </div>
        </div>
    </div>
</div>