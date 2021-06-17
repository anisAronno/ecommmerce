
<?php $__env->startSection('css'); ?>

    <style>
        .aa-product-catg-pagination a {
            margin: 0px 10px !important;
            color: #fff;
            background: #FF6666;
            padding: 3px 5px;
            border: 1px solid #FF6666;
            border-radius: 5px;
        }

        .aa-product-catg li figure .aa-add-card-btn {
            width: 100%;
        }

    </style>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <!-- product category -->
    <section id="aa-product-category">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
                    <div class="aa-product-catg-content">
                        <div class="aa-product-catg-head">
                            <div class="aa-product-catg-head-left">
                                <form action="" class="aa-sort-form">
                                    <label for="">Sort by</label>
                                    <select name="">
                                        <option value="1" selected="Default">Default</option>
                                        <option value="2">Name</option>
                                        <option value="3">Price</option>
                                        <option value="4">Date</option>
                                    </select>
                                </form>
                                <form action="" class="aa-show-form">
                                    <label for="">Show</label>
                                    <select name="">
                                        <option value="1" selected="12">12</option>
                                        <option value="2">24</option>
                                        <option value="3">36</option>
                                    </select>
                                </form>
                            </div>
                            <div class="aa-product-catg-head-right">
                                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
                            </div>
                        </div>
                        <div class="aa-product-catg-body">
                            <ul class="aa-product-catg">
                                <!-- start single product item -->
                                <?php $__currentLoopData = $allProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <figure>

                                            <?php $i= 1; ?>
                                            <?php $__currentLoopData = $allProduct->img; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($i > 0): ?>
                                                    <a class="aa-product-img"
                                                        href="<?php echo e(route('client.showProductDetails', ['slug' => $allProduct->product_slug])); ?>"><img
                                                            src="<?php echo e($images->image_path); ?>" alt="polo shirt img"
                                                            width="100%" height="300px"
                                                            style="background-position: center; background-repeat: no-repeat;background-size: cover;"></a>

                                                <?php endif; ?>
                                                <?php $i--; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <a class="aa-add-card-btn"
                                                onclick="productDetailsModal(<?php echo e($allProduct->id); ?>)"
                                                href="<?php echo e($allProduct->id); ?>" data-toggle2="tooltip" data-placement="top"
                                                data-toggle="modal" data-target="#quick-view-modal"><span
                                                    class="fa fa-shopping-cart" id="CartAddConfirmBtn"></span>Add To
                                                Cart</a>


                                            <figcaption>
                                                <h4 class="aa-product-title"><a
                                                        href="#"><?php echo e($allProduct->product_title); ?></a></h4>



                                                <span class="aa-product-price">&#2547;
                                                    <?php echo e($allProduct->product_selling_price); ?></span>
                                                <?php if($allProduct->product_price != $allProduct->product_selling_price): ?>
                                                    <span class="aa-product-price"><del> &#2547;
                                                            <?php echo e($allProduct->product_price); ?></del></span><?php endif; ?>

                                                <p class="aa-product-descrip"><?php echo nl2br(e($allProduct->product_discription)); ?></p>
                                            </figcaption>
                                        </figure>
                                        <div class="aa-product-hvr-content">
                                            
                                            
                                                    <a onclick="productQuickOrder(<?php echo e($allProduct->id); ?>)"
                                                        href="<?php echo e($allProduct->id); ?>" data-toggle2="tooltip" data-placement="top"
                                                         data-toggle="modal" data-target="#quick-order"><span>Quick Order</span></a>
                                            <a onclick="productDetailsModal(<?php echo e($allProduct->id); ?>)" data-toggle2="tooltip"
                                                data-placement="top" title="Quick View" data-toggle="modal"
                                                data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                                        </div>
                                        <!-- product badge -->
                                        <?php if($allProduct->product_in_stock): ?>
                                            <span class="aa-badge aa-sale" href="#">
                                                SALE!
                                            </span>
                                        <?php else: ?>
                                            <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <!-- start single product item -->

                            </ul>
                            <!-- quick view modal -->
                            <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                            <div class="row">
                                                <!-- Modal view slider -->
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="aa-product-view-slider">
                                                        <div class="simpleLens-gallery-container" id="demo-1">
                                                            <div class="simpleLens-container">
                                                                <div class="simpleLens-big-image-container">
                                                                    <a class="simpleLens-lens-image" id="simpleLensImage"
                                                                        data-lens-image="">
                                                                        <img src="" class="simpleLens-big-image"
                                                                            id="simpleLensBigImage">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="simpleLens-thumbnails-container">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal view content -->
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="aa-product-view-content">
                                                        <h3 id="pdTitle"></h3>
                                                        <div class="aa-price-block">
                                                            <span id="pdPrice" class="aa-product-view-price"></span>
                                                            <p class="aa-product-avilability">Avilability: <span
                                                                    id="inStock"></span></p>
                                                        </div>

                                                        <!-- Cable Configuration -->
                                                        <form id="cartForm" method="post">

                                                            <div class="product-color">
                                                                <span>Mezerment:</span>
                                                                <div class="meserment-choose mt-5">

                                                                </div>
                                                            </div>

                                                            <div class="product-color">
                                                                <span>Color</span>
                                                                <div class="color-choose mt-5">
                                                                </div>
                                                            </div>

                                                            <div class="aa-prod-quantity">

                                                                <select name="quantity" id="quantity">
                                                                    <option value="1" selected>1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="10">10</option>
                                                                </select>

                                                                <p class="aa-prod-category">
                                                                    Category: <a href="#" id="pdCategory"></a>
                                                                </p>
                                                            </div>
                                                            <div class="aa-prod-view-bottom">
                                                                <input type="hidden" id="product_ids" name="product_id"
                                                                    value="">
                                                                <button type="submit" class="aa-add-to-cart-btn"><span
                                                                        class="fa fa-shopping-cart"></span>Add To
                                                                    Cart</button>


                                                                <a href="" id="modalSingleView"
                                                                    class="aa-add-to-cart-btn">View Details</a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>
                            <!-- / quick view modal -->











                               <!-- quick view modal -->
                               <div class="modal fade" id="quick-order" tabindex="-1" role="dialog"
                               aria-labelledby="myModalLabel" aria-hidden="true">
                               <div class="modal-dialog">
                                   <div class="modal-content">
                                       <div class="modal-body">
                                           <button type="button" class="close" data-dismiss="modal"
                                               aria-hidden="true">&times;</button>
                                           <div class="row">
                                             <form id="quick-order-form" method="post">
                    
                                               <!-- Modal view content -->
                                               <div class="col-md-6 col-sm-6 col-xs-12">
                                                   <div class="aa-product-view-content">
                                                      
                                                       <!-- Cable Configuration -->
                                                    <p> Product Name: <span id="pdTitles" style="font-size: 20px;"></span></p>
                                                    <p> Product Price: <span id="pdPricesShow" style="font-size: 20px;"></span></p>

                                                            <input type="hidden" id="pdTitle_order" name="product_titles">
                                                           <div class="product-color">
                                                               <span>Mezerment:</span>
                                                               <div class="meserment-choose mt-5" id="meserment-chooses">
                                                               </div>
                                                           </div>
                                                           <div class="product-color">
                                                               <span>Color</span>
                                                               <div class="color-choose mt-5" id="color-chooses">
                                                               </div>
                                                           </div>

                                                           <div class="aa-prod-quantity">
                                                               <select name="quantity" id="quantitys">
                                                                   <option value="1" selected>1</option>
                                                                   <option value="2">2</option>
                                                                   <option value="3">3</option>
                                                                   <option value="4">4</option>
                                                                   <option value="5">5</option>
                                                                   <option value="10">10</option>
                                                               </select>
                                                           </div>
                                                          
                                                        </div>
                                                    </div>

                                                                               <!-- Modal view slider -->
                                               <div class="col-md-6 col-sm-6 col-xs-12">
                                                   <label for="customer_name">Name:</label>
                                                    <input type="text" class="form-control"name="customer_name" id="customer_name">
                                                    <label for="customer_phone_number">Nobile Number:</label>
                                                    <input type="text" class="form-control" name="customer_phone_number" id="customer_phone_number">
                                                    <div class="aa-prod-view-bottom" style="margin-top: 10px;">
                                                        <input type="hidden" name="pdPrices" id="pdPrices">
                                                           <button type="submit" class="aa-add-to-cart-btn"><span
                                                                   class="fa fa-shopping-cart"></span>Confirm Order</button>
                                                       </div>
                                                </div>

                                                </form>
                                             </div>
                                       </div>
                                   </div><!-- /.modal-content -->
                               </div><!-- /.modal-dialog -->
                           </div>



















                        </div>
                        <div class="aa-product-catg-pagination">
                            <?php echo e($allProducts->links()); ?>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
                    <aside class="aa-sidebar">
                        <!-- single sidebar -->
                        <div class="aa-sidebar-widget">
                            <h3>Category</h3>
                            <ul class="aa-catg-nav">
                                <?php $__currentLoopData = App\Models\ProductsCategoryModel::orderby('name', 'asc')
            ->where('parent_id', 0)
            ->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parentCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a
                                            href="<?php echo e(route('client.category', $parentCat->slug)); ?>"><?php echo e($parentCat->name); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <!-- single sidebar -->
                        
                        <!-- single sidebar -->
                        
                        <!-- single sidebar -->
                        
                        <!-- single sidebar -->
                        <div class="aa-sidebar-widget">
                            <h3>Top Rated Products</h3>
                            <div class="aa-recently-views">
                                <ul>
                                    <?php $__currentLoopData = $topRatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topRatedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <?php $i= 1; ?>
                                            <?php $__currentLoopData = $topRatedProduct->img; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($i > 0): ?>
                                                    <a class="aa-cartbox-img"
                                                        href="<?php echo e(route('client.showProductDetails', ['slug' => $topRatedProduct->product_slug])); ?>"><img
                                                            src="<?php echo e($images->image_path); ?>" alt="polo shirt img"
                                                            width="100%" height="300px"></a>
                                                <?php endif; ?>
                                                <?php $i--; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <div class="aa-cartbox-info">
                                                <h4><a
                                                        href="<?php echo e(route('client.showProductDetails', ['slug' => $topRatedProduct->product_slug])); ?>"><?php echo e($topRatedProduct->product_title); ?></a>
                                                </h4>
                                                <p>1 x &#2547; <?php echo e($topRatedProduct->product_price); ?></p>
                                            </div>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>

            </div>
        </div>
    </section>
    <!-- / product category -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        



        $('#cartForm').on('submit', function(event) {
            event.preventDefault();
            let formData = $(this).serializeArray();
            let meserment = formData[0]['value'];
            let color = formData[1]['value'];
            let quantity = formData[2]['value'];
            let product_ids = formData[3]['value'];

            let url = "<?php echo e(route('client.addCart')); ?>";
            axios.post(url, {
                meserment: meserment,
                color: color,
                quantity: quantity,
                product_id: product_ids
            }).then(function(response) {
                console.log(response.data);
                if (response.status == 200 && response.data == 1) {
                    $('#quick-view-modal').modal('hide');
                    toastr.success('Product Add Successfully');

                    getcartData()



                } else {
                    toastr.error('Product not Added ! Try Again');
                }

            }).catch(function(error) {
                toastr.error('Product not Added  ! Try Again');
            })


        })












        getcartData()

        function getcartData() {

            axios.get("<?php echo e(route('client.cartData')); ?>")
                .then(function(response) {

                    if (response.status = 200) {
                        var dataJSON = response.data;
                        var cartData = dataJSON.cart;

                        var a = Object.keys(cartData).length;


                        $("#cart_quantity").html(a);
                        $("#total_cart_price").html(' &#2547; ' + dataJSON.total);

                        var imageViewHtml = "";
                        $.each(cartData, function(i, item) {

                            imageViewHtml += '<li>';
                            imageViewHtml += '<a class="aa-cartbox-img" href="#"><img src=" ' + cartData[i]
                                .image +
                                ' " alt="img"></a>';
                            imageViewHtml += '<div class="aa-cartbox-info"> <h4><a href="#">' + cartData[i]
                                .title +
                                '</a> </h4> <p>' + cartData[i].quantity + ' x &#2547; ' + cartData[i]
                                .unit_price +
                                '</p>  </div>';
                            imageViewHtml +=
                                '<div class="aa-remove-product"><button class="cartDeleteIcon" data-id=' +
                                i +
                                '  style=" display:inline-block" type="submit" class="fa fa-times"><i class="fa fa-remove"></i></button> </div>';
                            imageViewHtml += '</li>';
                        });


                        $('#headerCart').html(imageViewHtml);

                        console.log(a);

                        if (a == 0) {
                            $("#HeaderPreview").css("display", "none");
                        }else{
                            $("#HeaderPreview").css("display", "block");
                        }


                        //Carts click on delete icon
                        $(".cartDeleteIcon").click(function() {
                            var id = $(this).data('id');
                            $('#CartsDeleteId').html(id);
                            DeleteDataCart(id);
                        })
                    } else {
                        toastr.error('Something Went Wrong');
                    }
                }).catch(function(error) {

                    toastr.error('Something Went Wrong...');
                });
        }





        $('#confirmDeleteCart').click(function() {
            ;
            var id = $(this).data('id');
            DeleteDataCart(id);
        })


        //delete Cart function
        function DeleteDataCart(id) {

            axios.post("<?php echo e(route('client.cartRemove')); ?>", {
                    product_id: id
                })
                .then(function(response) {

                    if (response.status == 200) {
                        toastr.success('Cart Removed Success.');
                        getcartData();
                    } else {
                        toastr.error('Something Went Wrong');
                    }
                }).catch(function(error) {

                    toastr.error('Something Went Wrong......');
                });
        }









//Quick Order Details

$('#quick-order-form').on('submit', function (event) {
    event.preventDefault();

    let product_title = $('#pdTitle_order').val();
    let meserment = $("input[name=meserment_chooses]").val();
    let color = $("input[name=color_chooses]").val();
    let product_price = $('#pdPrices').val();
    let quantity = $('#quantitys').val();
    let customer_name = $('#customer_name').val();
    let customer_phone_number = $('#customer_phone_number').val();

    if (product_title.length == 0) {
        toastr.error('Product Title Is Empty');
    } else if (customer_name.length == 0) {
        toastr.error('Your Name Is Empty');
    } else if (customer_phone_number.length == 0) {
        toastr.error('Mobile Number Is Empty');
    }  else if (product_title.length == 0) {
        toastr.error('Product Is Empty');
    }  else if (product_price.length == 0) {
        toastr.error('Price Is Empty');
    } else {
        let quick_order_url ="<?php echo e(route('client.quickOrder')); ?>";
        axios.post(quick_order_url, {

            product_title: product_title,
            meserment: meserment,
            color: color,
            quantity: quantity,
            product_price: product_price,
            customer_phone_number: customer_phone_number,
            customer_name: customer_name

        }).then(function (response) {
            
            if (response.status == 200 && response.data == 1) {
                $('#quick-order').modal('hide');
                toastr.success('Order Place Successfully');
            } else {
                toastr.error('Order Not Place ! Try Again');
            }

        }).catch(function (error) {
         
            toastr.error('Order Not Place ! Try Again..');
        })
    }



})



function productQuickOrder(id) {
   
    var productQuickOrder_url ="<?php echo e(route('client.getsingleProductdata')); ?>";
    axios.post(productQuickOrder_url, {
        id: id
    })
        .then(function (response) {
            console.log(response.data);
            if (response.status == 200) {
                var jsonData = response.data;
                console.log(jsonData);

                $('#pdTitle_order').val(jsonData[0].product_title);
                $('#pdPrices').val(jsonData[0].product_selling_price);
                $('#pdTitles').html(jsonData[0].product_title);
                $('#pdPricesShow').html(jsonData[0].product_selling_price);




                var maserment = "";
                for (let index = 0; index < jsonData[0].maserment.length; index++) {
                    const element = jsonData[0].maserment[index];
                    checked = ""
                    if (index == 0) {
                        checked = "checked"
                    } else {
                        checked = ""
                    }

                    maserment += '<div>';
                    maserment += '<input type="radio" id="' + element.meserment_value + '" name="meserment_chooses" id="meserment_chooses" ' +
                        checked + ' value="' + element.meserment_value + '">';
                    maserment += '<label for="' + element.meserment_value +
                        '"><span style="background-color:#000;"></span></label>';
                    maserment += '<span>' + element.meserment_value + '</span>&nbsp;';
                    maserment += '</div>';

                }

                $('#meserment-chooses').html(maserment);




                var color = "";
                for (let index = 0; index < jsonData[0].color.length; index++) {
                    const elementColor = jsonData[0].color[index];

                    colorChecked = ""
                    if (index == 0) {
                        colorChecked = "checked"
                    } else {
                        colorChecked = ""
                    }
                    color += '<div>';
                    color += '<input type="radio" id="' + elementColor.product_color_code + '" name="color_chooses" id="color_chooses" ' +
                        colorChecked + ' value="' + elementColor.product_color_code + '">';
                    color += '<label for="' + elementColor.product_color_code +
                        '"><span style="background-color:' + elementColor.product_color_code +
                        ';"></span></label>';
                    color += '</div>';

                }

                $('#color-chooses').html(color);


            } else {

                toastr.error('Something Went Wrong...');
            }
        }).catch(function (error) {

            toastr.error('Something Went Wrong...');
        });
}













/// SIngle Product View

function productDetailsModal(id) {
   
    let url ="<?php echo e(route('client.getsingleProductdata')); ?>";
    axios.post(url, {
                id: id
            })
        .then(function(response) {
            console.log(response.data);
            if (response.status == 200) {
                var jsonData = response.data;


                var url= `product/${jsonData[0].product_slug}`;
                var simpleLensImageUrl = jsonData[0].img[0].image_path;


                var inStock = '';
                if (jsonData[0].product_in_stock == 0) {
                    inStock = "STOCK OUT!"
                } else {
                    inStock = "SALE!"
                }

                $('#pdTitle').html(jsonData[0].product_title);
                $('#pdPrice').html("&#2547;   " + jsonData[0].product_selling_price);
                $('#inStock').html(inStock);
                $('#pdCategory').html(jsonData[0].cat.name);
                $('#product_ids').val(id);
                $('#modalSingleView').attr("href" , url );
                $('#simpleLensImage').attr("data-lens-image" , simpleLensImageUrl );
                $('#simpleLensBigImage').attr("src" , simpleLensImageUrl );




                var maserment="";
                for (let index = 0; index < jsonData[0].maserment.length; index++) {
                    const element =  jsonData[0].maserment[index];
                    checked=""
                    if (index==0) {
                        checked="checked"
                    }else{
                        checked=""
                    }

                    maserment+='<div>';
                    maserment+='<input type="radio" id="'+element.meserment_value+'" name="maserment" '+checked+' value="'+element.meserment_value+'">';
                    maserment+='<label for="'+element.meserment_value+'"><span style="background-color:#000;"></span></label>';
                    maserment+='<span>'+element.meserment_value+'</span>&nbsp;';
                    maserment+='</div>';

                }

                $('.meserment-choose').html(maserment);




                var color="";
                for (let index = 0; index < jsonData[0].color.length; index++) {
                    const elementColor =  jsonData[0].color[index];

                    colorChecked=""
                    if (index==0) {
                        colorChecked="checked"
                    }else{
                        colorChecked=""
                    }
                    color+='<div>';
                    color+='<input type="radio" id="'+elementColor.product_color_code+'" name="color" '+colorChecked+' value="'+elementColor.product_color_code+'">';
                    color+='<label for="'+elementColor.product_color_code+'"><span style="background-color:'+elementColor.product_color_code+';"></span></label>';
                    color+='</div>';

                }

                $('.color-choose').html(color);

                var img="";
                for (let i = 0; i < jsonData[0].img.length; i++) {
                    const elementImg =  jsonData[0].img[i];

                    img+='<a  href="'+elementImg.image_path+'" class="simpleLens-thumbnail-wrapper"  data-lens-image="'+elementImg.image_path+'"  data-big-image="'+elementImg.image_path+'" ><img width="50px" height="50px" src="'+elementImg.image_path+'"></a>';

                }
                $('.simpleLens-thumbnails-container').html(img);


            } else {

            }
        }).catch(function(error) {

        });
}


















    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecom-final\resources\views/client/pages/categoryShow.blade.php ENDPATH**/ ?>