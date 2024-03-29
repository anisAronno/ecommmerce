<div id="mainDivProducts" class="container-fluid d-none">
    <div class="row">
        <div class="col-md-12 p-3">
            {{-- <button id="addBtnproduct" class="btn btn-sm btn-danger my-3">Add
                New</button> --}}

            <button id="addBtnproduct" type="button" class="btn btn-danger" data-toggle="modal"
                data-target="#exampleModalPreview">
                Add New
            </button>

            <a href="{{ route('admin.productExport') }}" id="product Export"
                class="btn btn-primary btn-learge  float-right">
                Excel Export
            </a>


            <table id="productDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-xs">Product ID</th>
                        <th class="th-xs">Title</th>
                        <th class="th-xs">SKU</th>
                        <th class="th-xs">Purchase Price</th>
                        <th class="th-xs">Price</th>
                        <th class="th-xs">Selling Price</th>
                        <th class="th-xs">Stock</th>
                        <th class="th-xs">Category</th>
                        <th class="th-xs">Status</th>
                        <th class="th-xs">View</th>
                        <th class="th-xs EditIcon">Edit</th>
                        <th class="th-xs DeleteIcon">Delete</th>
                    </tr>
                </thead>
                <tbody id="Product">
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
            <form action="{{ route('admin.productAdd') }}" method="post" id="product_add_form">
                @csrf
                <div class=" modal-header-full-width   modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalPreviewLabel">Product Add</h5>
                    <button  type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span style="font-size: 1.3em;" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <input  id="pdName" type="text" id="" class="form-control mb-3"
                                    placeholder="Product Name">
                                <textarea id="pdDescription" type="text" id="" class="form-control mb-3 ckeditor"
                                    placeholder="Product Description" cols="30" rows="5"></textarea>


                                <div class="row  mt-2">

                                    <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                        <label for="pdPrice">Product Price:</label>
                                        <input id="pdPrice" type="number" class="form-control mb-3"
                                            placeholder="Product Price" min="0" onkeyup="calculate();"
                                            onchange="calculate();"
                                            onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))">
                                    </div>
                                    <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                        <label for="pdSaving">Discount(%):</label>
                                        <input id="pdSaving" type="number" value="0" class="form-control mb-3"
                                            placeholder="Saving Percentege" min="0" max="100" onkeyup="calculate();"
                                            onchange="calculate();">
                                    </div>
                                    <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                        <label for="pdOffer">Selling Price:</label>
                                        <input id="pdOffer" type="number" class="form-control mb-3" readonly
                                            placeholder="Offer Price" min="0"
                                            onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))">
                                    </div>
                                </div>


                                <div class="row mt-2">
                                    <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                        <label for="sku">Product SKU:</label>
                                        <input id="sku" type="text" id="" class="form-control mb-3" placeholder="SKU">
                                    </div>
                                    <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                        <label for="purchase_price">Purchase Price:</label>
                                        <input id="purchase_price" type="number" class="form-control mb-3"
                                            placeholder="Purchase Price" min="0" onkeyup="calculate();"
                                            onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))">
                                    </div>

                                    <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                        <label for="pdStock">Stock Quantity:</label>
                                        <input id="pdStock" type="number" class="form-control mb-3"
                                            placeholder="Stock Quantity" min="0" onkeyup="calculate();"
                                            onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))">
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <label for="pdQuantity">Product Quantity:</label>
                                        <input id="pdQuantity" type="number" id="" class="form-control mb-3"
                                            placeholder="Product Quantity" value="1" min="1" max="1000"
                                            onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))">
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <label for="pdTax">Product Tax(%):</label>
                                        <input id="pdTax" type="number" class="form-control mb-3"
                                            placeholder="Product Tax" value="0" min="0" onkeyup="calculate();"
                                            onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))">
                                    </div>

                                </div>






                                <select id="pdCategory" style="margin-bottom: 10px;"
                                    class="browser-default custom-select">
                                </select>
                                <select id="pdBrand" style="margin-bottom: 10px;" class="browser-default custom-select">
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
                                <label for="pdmeserment">Product Measurement:</label>
                                <select id="pdmeserment" style="margin-bottom: 10px;"
                                    class="browser-default custom-select">
                                    <option selected value="0">Select Measurement</option>
                                    <option value="1">Size</option>
                                    <option value="2">Wight</option>
                                    <option value="3">Dimention</option>
                                    <option value="4">Custom</option>
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
                                                        <input type="file" id="productImageOne"
                                                            class="form-control mb-3" name="productImage[]">
                                                    </td>
                                                    <td>
                                                        <img id="productImageOnePreview"
                                                            style="height: 100px !important; width: 200px !important;"
                                                            class="imgPreview mx-auto"
                                                            src="{{ asset('admin/images/default-image.png') }}" />
                                                    </td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td>
                                                        <input type="file" id="productImageTwo"
                                                            class="form-control mb-3" name="productImage[]">
                                                    </td>
                                                    <td>
                                                        <img id="productImageTwoPreview"
                                                            style="height: 100px !important; width: 200px !important;"
                                                            class="imgPreview mx-auto"
                                                            src="{{ asset('admin/images/default-image.png') }}" />
                                                    </td>
                                                <tr class="text-center">
                                                    <td>
                                                        <input type="file" id="productImageThree"
                                                            class="form-control mb-3" name="productImage[]">
                                                    </td>
                                                    <td>
                                                        <img id="productImageThreePreview"
                                                            style="height: 100px !important; width: 200px !important;"
                                                            class="imgPreview mx-auto"
                                                            src="{{ asset('admin/images/default-image.png') }}" />
                                                    </td>
                                                <tr class="text-center">
                                                    <td>
                                                        <input type="file" id="productImageFour"
                                                            class="form-control mb-3" name="productImage[]">
                                                    </td>
                                                    <td>
                                                        <img id="productImageFourPreview"
                                                            style="height: 100px !important; width: 200px !important;"
                                                            class="imgPreview mx-auto"
                                                            src="{{ asset('admin/images/default-image.png') }}" />
                                                    </td>
                                                <tr class="text-center">
                                                    <td>
                                                        <input type="file" id="productImageFive"
                                                            class="form-control mb-3" name="productImage[]">
                                                    </td>
                                                    <td>
                                                        <img id="productImageFivePreview"
                                                            style="height: 100px !important; width: 200px !important;"
                                                            class="imgPreview mx-auto"
                                                            src="{{ asset('admin/images/default-image.png') }}" />
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                                <div class="card mt-2">
                                    <div class="card-header">
                                        <h5>Add Color</h5>
                                        <p>Use multiple colors. separated with come ( , )</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <select id="pdcolor" class="browser-default custom-select" multiple style="width: 100% !important; overflow: hidden;">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer-full-width  modal-footer">
                    <button type="button" class="btn btn-danger btn-md btn-rounded" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-md btn-rounded" id="productAddConfirmBtn">Save
                        changes</button>
                </div>
            </form>
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
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">No</button>
                <button data-id="" id="confirmDeleteproduct" type="button" class="btn btn-sm btn-primary">Yes</button>
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
                <h5 class="modal-title w-100" id="exampleModalPreviewLabel">Product View</h5>
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
                                    <td>SKU</td>
                                    <td id="pdSku"></td>
                                </tr>
                                <tr>
                                    <td>Stock</td>
                                    <td id="product_stock"></td>
                                </tr>
                                <tr>
                                    <td>Purchase Price</td>
                                    <td id="pdPurchasePrice"></td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td id="pdPriceShow"></td>
                                </tr>
                                <tr>
                                    <td>Discount</td>
                                    <td id="pdDiscount"></td>
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
                                    <td>Product Tax(%)</td>
                                    <td id="pdViewTax"></td>
                                </tr>

                                <tr>
                                    <td>Category Name</td>
                                    <td id="category_id"></td>
                                </tr>

                                <tr>
                                    <td>Brand Name</td>
                                    <td id="brand_id"></td>
                                </tr>

                                <tr>
                                    <td>Product Owner</td>
                                    <td id="vendor_id">

                                    </td>
                                </tr>
                                <tr>
                                    <td>Product Color</td>
                                    <td id="">
                                        <ul id="color" style="list-style-type: none; display:flex"></ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Product Measurement </td>
                                    <td>
                                        <ul id="product_meserment_type" style="list-style-type: none; display:flex">
                                        </ul>
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



<!--Edit Modal-->
<div class="modal fade right" id="updateProductModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
    <div class="modal-dialog-full-width modal-dialog momodel modal-fluid" role="document">
        <form action="{{ route('admin.productsUpdate') }}" method="post" id="product_edit_form">
            @csrf
        <div class="modal-content-full-width modal-content ">
            <div class=" modal-header-full-width   modal-header text-center">
                <h5 class="modal-title w-100" id="exampleModalPreviewLabel">Product Update</h5>
                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                    <span style="font-size: 1.3em;" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 id="productEditId" class="mt-4 d-none"></h5>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="pdEditName">Product Name:</label>
                            <input id="pdEditName" type="text" id="" class="form-control mb-3"
                                placeholder="Product Name">
                            <input type="hidden" id="product_id_edit">
                            <label for="pdEditDescription">Product Description:</label>
                            <textarea id="pdEditDescription" type="text" id="" class="form-control mb-3 ckeditor"
                                placeholder="Product Description" cols="30" rows="5"></textarea>



                            <div class="row  mt-2">

                                <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <label for="pdEditPrice">Product Price:</label>
                                    <input id="pdEditPrice" type="number" class="form-control mb-3"
                                        placeholder="Product Price" min="0" onkeyup="calculateEdit();"
                                        onchange="calculateEdit();"
                                        onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))">
                                </div>
                                <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <label for="pdEditSaving">Product Discount(%):</label>
                                    <input id="pdEditSaving" type="number" class="form-control mb-3"
                                        placeholder="Saving Percentege" min="0" max="100" onkeyup="calculateEdit();"
                                        onchange="calculateEdit();">
                                </div>
                                <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <label for="pdEditOffer">Product Selling Price:</label>
                                    <input id="pdEditOffer" type="number" class="form-control mb-3" readonly
                                        placeholder="Offer Price" min="0"
                                        onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))">
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <label for="pdEditSku">Product SKU:</label>
                                    <input id="pdEditSku" type="text" id="" class="form-control mb-3" placeholder="SKU">
                                </div>
                                <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <label for="pdEditPurchasePrice">Purchase Price:</label>
                                    <input id="pdEditPurchasePrice" type="number" class="form-control mb-3"
                                        placeholder="Purchase Price" min="0" onkeyup="calculate();"
                                        onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))">
                                </div>

                                <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <label for="pdEditStock">Stock Quantity:</label>
                                    <input id="pdEditStock" type="number" class="form-control mb-3"
                                        placeholder="Stock Quantity" min="0" onkeyup="calculate();"
                                        onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))">
                                </div>

                            </div>




                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <label for="pdEditQuantity">Product Quantity:</label>
                                    <input id="pdEditQuantity" type="number" id="" class="form-control mb-3"
                                        placeholder="Product Quantity" min="0" max="1000"
                                        onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))">
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <label for="pdEditTax">Product Tax(%):</label>
                                    <input id="pdEditTax" type="number" class="form-control mb-3"
                                        placeholder="Product Tax" min="0" onkeyup="calculate();"
                                        onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))">
                                </div>
                            </div>


                            <label for="pdEditCategory">Product Category:</label>
                            <select id="pdEditCategory" style="margin-bottom: 10px;"
                                class="browser-default custom-select"></select>
                            <label for="pdEditBrand">Product Brand:</label>
                            <select id="pdEditBrand" style="margin-bottom: 10px;" class="browser-default custom-select">
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
                                    <option value="1">Publish</option>
                                    <option value="0">Panding</option>
                                </select>
                            </div>
                            <label for="pdmesermentEdit">Product Measurement:</label>
                            <select id="pdmesermentEdit" style="margin-bottom: 10px;"
                                class="browser-default custom-select">
                                <option value="0">Select Measurement</option>
                                <option value="1">Size</option>
                                <option value="2">Wight</option>
                                <option value="3">Dimention</option>
                                <option value="4">Custom</option>
                            </select>

                            <div class="meserment_edit">

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
                                                    <input type="file" id="productEditImageOne"
                                                        class="form-control mb-3" name="productEditImage[]">
                                                </td>
                                                <td>
                                                    <img id="productEditImageOnePreview"
                                                        style="height: 100px !important; width: 200px !important;"
                                                        class="imgPreview mx-auto"
                                                        src="{{ asset('admin/images/default-image.png') }}" />
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
                                                        src="{{ asset('admin/images/default-image.png') }}" />
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
                                                        src="{{ asset('admin/images/default-image.png') }}" />
                                                </td>
                                            <tr class="text-center">
                                                <td>
                                                    <input type="file" id="productEditImageFour"
                                                        class="form-control mb-3" name="productEditImage[]">
                                                </td>
                                                <td>
                                                    <img id="productImageEditFourPreview"
                                                        style="height: 100px !important; width: 200px !important;"
                                                        class="imgPreview mx-auto"
                                                        src="{{ asset('admin/images/default-image.png') }}" />
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
                                                        src="{{ asset('admin/images/default-image.png') }}" />
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card mt-2">
                                <div class="card-header">
                                    <h5>Edit Colors</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                       
                                            <select name="pdcolorEdit" id="addEditColorInput" class="browser-default custom-select" multiple style="width: 100% !important; overflow: hidden;">

                                            </select>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer-full-width  modal-footer">
                <button type="button" class="btn btn-danger btn-md btn-rounded" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-md btn-rounded" id="productEditConfirmBtn">Save
                    Changes</button>
            </div>
        </div>
        </form>
    </div>
</div>
