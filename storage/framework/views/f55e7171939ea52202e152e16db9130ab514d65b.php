<?php $__env->startSection('title'); ?>
    <?php echo e($productDetails->product_title); ?>

<?php $__env->stopSection(); ?>
<?php
$arr = $productDetails->rating;
$sum = 0;
foreach ($arr as $item) {
    $sum += $item['star_reating'];
}

if (count($arr) > 0) {
    $average = $sum / count($arr);
    $ratingValue = round(intval($average));
} else {
    $ratingValue = 0;
}

?>
<?php $__env->startSection('content'); ?>
    <!-- Page Title
                                                                                                                          ============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1><?php echo $productDetails->product_title; ?></h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('client.home')); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('client.shop')); ?>">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $productDetails->product_title; ?></li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
                                                                                                                          ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="single-product">
                    <div class="product">
                        <div class="row gutter-40">

                            <div class="col-md-6">

                                <!-- Product Single - Gallery
                                                                                                                                 ============================================= -->
                                <div class="product-image">
                                    <div class="fslider" data-pagi="false" data-arrows="false" data-thumbs="true">
                                        <div class="flexslider">
                                            <div class="slider-wrap" data-lightbox="gallery">
                                                <?php $__currentLoopData = $productDetails->img; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="slide" data-thumb="<?php echo e($images->image_path); ?>"><a
                                                            href="<?php echo e($images->image_path); ?>"
                                                            title="Pink Printed Dress - Front View"
                                                            data-lightbox="gallery-item"><img
                                                                src="<?php echo e($images->image_path); ?>"
                                                                alt="Pink Printed Dress" class="pinterest-img"></a></div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if($productDetails->product_in_stock): ?>
                                        <div class="sale-flash badge badge-danger p-2">Sale!</div>
                                    <?php else: ?>
                                        <div class="sale-flash badge badge-danger p-2">Out of Stock!</div>
                                    <?php endif; ?>
                                </div><!-- Product Single - Gallery End -->

                            </div>

                            <div class="col-md-6 product-desc">

                                <div class="d-flex align-items-center justify-content-between">

                                    <!-- Product Single - Price
                                                                                                                                  ============================================= -->
                                    <div class="product-price">
                                        <?php if($productDetails->product_price != $productDetails->product_selling_price): ?>
                                            <del>&#2547; <?php echo e($productDetails->product_price); ?></del>
                                        <?php endif; ?> <ins>&#2547;
                                            <?php echo e($productDetails->product_selling_price); ?></ins>
                                    </div><!-- Product Single - Price End -->

                                    <!-- Product Single - Rating
                                                                                                                                  ============================================= -->
                                    <div class="d-flex align-items-center">
                                        <div class="product-rating">
                                            <?php if($ratingValue > 0): ?>
                                                <?php for($i = 0; $i < $ratingValue; $i++): ?>
                                                    <i class="icon-star3"></i>
                                                <?php endfor; ?>
                                                <?php
                                                    $emptyValue = 5 - $ratingValue;
                                                ?>
                                                <?php for($i = 0; $i < $emptyValue; $i++): ?>
                                                    <i class="icon-star-empty"></i>
                                                <?php endfor; ?>
                                            <?php else: ?>
                                                <i class="icon-star-empty"></i>
                                                <i class="icon-star-empty"></i>
                                                <i class="icon-star-empty"></i>
                                                <i class="icon-star-empty"></i>
                                                <i class="icon-star-empty"></i>
                                            <?php endif; ?>




                                        </div><!-- Product Single - Rating End -->

                                        <?php if(auth()->guard()->guest()): ?>
                                            <a href="javascript:void(0);" onclick="toastr.info('To add Favorite List. You need to login first.','Info',{
                                                                           closeButton: true,
                                                                           progressBar: true,
                                                                       })" class="btn btn-sm btn-secondary ml-3"><i
                                                    class="icon-heart3"></i> <span>
                                                    (<?php echo e($productDetails->favorite_to_users->count()); ?>)</span></a>
                                        <?php else: ?>
                                            <a href="javascript:void(0);"
                                                onclick="document.getElementById('favorite-form-<?php echo e($productDetails->id); ?>').submit();"
                                                class="<?php echo e(!Auth::user()->favorite_product->where('pivot.product_id', $productDetails->id)->count() == 0
    ? 'favorite_posts'
    : ''); ?>  btn btn-secondary ml-3">
                                                <i class="icon-heart"></i><span class="text-dark">&nbsp;(<span
                                                        class="favorite_posts"><?php echo e($productDetails->favorite_to_users->count()); ?></span>)</span></a>

                                            <form id="favorite-form-<?php echo e($productDetails->id); ?>" method="POST"
                                                action="<?php echo e(route('client.favorite', $productDetails->id)); ?>"
                                                style="display: none;">
                                                <?php echo csrf_field(); ?>
                                            </form>
                                        <?php endif; ?>
                                    </div>

                                </div>

                                <div class="line"></div>

                                <!-- Product Single - Quantity & Cart Button
                                                                                                                                 ============================================= -->

                                <form id="cartForm2" method="post">

                                    <div class="cart mb-0 d-flex justify-content-between align-items-center">
                                        <div class="quantity clearfix">
                                            <input type="button" value="-" class="minus">
                                            <input type="number" step="1" min="1" name="quantity" id="quantity" value="1"
                                                title="Qty" class="qty" />
                                            <input type="button" value="+" class="plus">
                                        </div>
                                        <input type="hidden" id="product_id" name="product_id"
                                            value="<?php echo e($productDetails->id); ?>">
                                        <button type="submit" class="add-to-cart button m-0">Add to cart</button>
                                    </div>
                                    <!-- Product Single - Quantity & Cart Button End -->


                                    <div class="row mt-3">
                                        <div class="col-md-6 form-group">
                                            <label for="note1">Note</label>
                                            <input type="text" class="form-control" id="note1" name="note1">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="note1">Special Note</label>
                                            <input type="text" class="form-control" id="note2" name="note2">
                                        </div>
                                    </div>
                                    <div class="line"></div>

                                    <!-- Product Single - Short Description  -->
                                    <p><?php echo $productDetails->product_discription; ?></p>

                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                            <span class="text-muted">Category:</span><span
                                                class="text-dark font-weight-semibold"><?php echo e($productDetails->category->name); ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                            <span class="text-muted">Color:</span><span
                                                class="text-dark font-weight-semibold">
                                                <?php if(count($productDetails->color) > 0): ?>
                                                    <!-- Product Color -->


                                                    <div class="color-choose">

                                                        <?php $__currentLoopData = $productDetails->color; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div>
                                                                <input type="radio" id="<?php echo e($color->product_color_code); ?>"
                                                                    name="color" <?php if($loop->first): ?> <?php echo e('checked'); ?> <?php endif; ?>
                                                                    value="<?php echo e($color->product_color_code); ?>">
                                                                <label for="<?php echo e($color->product_color_code); ?>"><span
                                                                        style="background-color:<?php echo e($color->product_color_code); ?> "></span></label>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                                <?php endif; ?>
                                            </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                            <span class="text-muted">Size:</span><span
                                                class="text-dark font-weight-semibold">
                                                <?php if(count($productDetails->maserment) > 0): ?>
                                                    <div class="meserment-choose">
                                                        <?php $__currentLoopData = $productDetails->maserment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $maserment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div>
                                                                <input type="radio"
                                                                    id="<?php echo e($maserment->meserment_value); ?>"
                                                                    name="maserment" <?php if($loop->first): ?> <?php echo e('checked'); ?> <?php endif; ?>
                                                                    value="<?php echo e($maserment->meserment_value); ?>">
                                                                <label for="<?php echo e($maserment->meserment_value); ?>"><span
                                                                        style="background-color:#000;"></span></label>
                                                                <span><?php echo e($maserment->meserment_value); ?></span>&ensp;
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                            <span class="text-muted">Quantity:</span><span
                                                class="text-dark font-weight-semibold"><?php echo e($productDetails->product_quantity); ?>

                                                Pcs</span>
                                        </li>

                                    </ul>
                                </form>
                                <!-- Product Single - Share
                                                                                                                                 ============================================= -->


                                <div class="si-share d-flex justify-content-between align-items-center mt-4">
                                    <span>Share:</span>
                                    <div>
                                        <a href="#" class="social-icon si-borderless si-facebook facebook-btn">
                                            <i class="icon-facebook"></i>
                                            <i class="icon-facebook"></i>
                                        </a>
                                        <a href="#" class="social-icon si-borderless si-twitter twitter-btn">
                                            <i class="icon-twitter"></i>
                                            <i class="icon-twitter"></i>
                                        </a>
                                        <a href="#" class="social-icon si-borderless si-pinterest pinterest-btn">
                                            <i class="icon-pinterest"></i>
                                            <i class="icon-pinterest"></i>
                                        </a>
                                        <a href="#" class="social-icon si-borderless si-gplus linkedin-btn">
                                            <i class="icon-linkedin"></i>
                                            <i class="icon-linkedin"></i>
                                        </a>
                                        <a href="#" class="social-icon si-borderless si-rss  whatsapp-btn">
                                            <i class="icon-whatsapp"></i>
                                            <i class="icon-whatsapp"></i>
                                        </a>


                                    </div>
                                </div>


                                <!-- Product Single - Share End -->

                            </div>

                            <div class="w-100"></div>

                            <div class="col-12 mt-5">

                                <div class="tabs clearfix mb-0" id="tab-1">

                                    <ul class="tab-nav clearfix">
                                        <li><a href="#tabs-1"><i class="icon-align-justify2"></i><span
                                                    class="d-none d-md-inline-block"> Description</span></a></li>
                                        <li><a href="#tabs-2"><i class="icon-info-sign"></i><span
                                                    class="d-none d-md-inline-block"> Additional Information</span></a></li>
                                        <li><a href="#tabs-3"><i class="icon-star3"></i><span
                                                    class="d-none d-md-inline-block"> Reviews ( <span
                                                        id="reviewCount"></span> )</span></a></li>
                                    </ul>

                                    <div class="tab-container">

                                        <div class="tab-content clearfix" id="tabs-1">
                                            <p><?php echo $productDetails->product_discription; ?></p>

                                        </div>
                                        <div class="tab-content clearfix" id="tabs-2">

                                            <table class="table table-striped table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td>Size</td>
                                                        <td>
                                                            <?php if(count($productDetails->maserment) > 0): ?>
                                                                <div class="meserment-choose">
                                                                    <?php $__currentLoopData = $productDetails->maserment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $maserment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <div>
                                                                            <input type="radio"
                                                                                id="<?php echo e($maserment->meserment_value); ?>"
                                                                                name="maserment" <?php if($loop->first): ?> <?php echo e('checked'); ?> <?php endif; ?>
                                                                                value="<?php echo e($maserment->meserment_value); ?>">
                                                                            <label
                                                                                for="<?php echo e($maserment->meserment_value); ?>"><span
                                                                                    style="background-color:#000;"></span></label>
                                                                            <span><?php echo e($maserment->meserment_value); ?></span>&ensp;
                                                                        </div>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Color</td>
                                                        <td>
                                                            <?php if(count($productDetails->color) > 0): ?>
                                                                <!-- Product Color -->


                                                                <div class="color-choose">
                                                                    <?php $__currentLoopData = $productDetails->color; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <div>
                                                                            <input type="radio"
                                                                                id="<?php echo e($color->product_color_code); ?>"
                                                                                name="color" <?php if($loop->first): ?> <?php echo e('checked'); ?> <?php endif; ?>
                                                                                value="<?php echo e($color->product_color_code); ?>">
                                                                            <label
                                                                                for="<?php echo e($color->product_color_code); ?>"><span
                                                                                    style="background-color:<?php echo e($color->product_color_code); ?> "></span></label>
                                                                        </div>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>

                                        </div>
                                        <div class="tab-content clearfix" id="tabs-3">

                                            <div id="reviews" class="clearfix">



                                                <div class="aa-product-review-area">
                                                    <h4> <span id="reviewCount"
                                                            style="font-weight:bold; color:red; font-size:30px;">
                                                        </span> Reviews for <?php echo $productDetails->product_title; ?></h4>
                                                    <ul class="aa-review-nav" id="reviewResult"
                                                        style="max-height: 500px; overflow:scroll; overflow-x:hidden;">


                                                    </ul>
                                                    <?php if(auth()->guard()->check()): ?>
                                                        <h4>Add a review</h4>
                                                        <div class="aa-your-rating">
                                                            <p>Your Rating</p>
                                                            <div id="rateYo"></div>
                                                        </div>
                                                        <!-- review form -->

                                                        <form action="" class="aa-review-form" id="reating">
                                                            <div class="form-group">
                                                                <label for="message" id="reviewEmpty">Your Review <span
                                                                        style="color:red">*</span></label>
                                                                <textarea class="form-control" rows="3" id="massage"
                                                                    wrap="hard"></textarea>
                                                            </div>
                                                            <button type="submit"
                                                                class="btn btn-primary add-to-cart button m-0">Submit</button>
                                                            <p id="messegeview"></p>
                                                        </form>
                                                    <?php endif; ?>
                                                    <?php if(auth()->guard()->guest()): ?>

                                                        <h2 style="color: #FF6666; font-weight:bold; text-align:center;">Please
                                                            <a href="<?php echo e(route('client.login')); ?>"
                                                                class="text-center text-decoration-none text-primary">Login</a>
                                                            For Reating
                                                            And Review
                                                        </h2>

                                                    <?php endif; ?>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="line"></div>

                <div class="w-100">

                    <h4>Related Products</h4>
                    <?php
                        $relProducts = App\Models\Product::with('img')
                            ->where('product_category_id', $productDetails->product_category_id)
                            ->where('product_active', 1)
                            ->take(12)
                            ->inRandomOrder()
                            ->get();

                    ?>
                    <div class="owl-carousel product-carousel carousel-widget" data-margin="30" data-pagi="false"
                        data-autoplay="5000" data-items-xs="1" data-items-md="2" data-items-lg="3" data-items-xl="4">

                        <?php $__currentLoopData = $relProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="oc-item">
                                <div class="product">
                                    <div class="product-image">

                                        <?php $i= 2; ?>
                                        <?php $__currentLoopData = $relProduct->img; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($i > 0): ?>
                                                <a
                                                    href="<?php echo e(route('client.showProductDetails', ['slug' => $relProduct->product_slug])); ?>"><img
                                                        src="<?php echo e($images->image_path); ?>" alt="Checked Short Dress"></a>
                                            <?php endif; ?>
                                            <?php $i--; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                        <div class="badge badge-success p-2">50% Off*</div>
                                        <div class="bg-overlay">
                                            <div class="bg-overlay-content align-items-end justify-content-between"
                                                data-hover-animate="fadeIn" data-hover-speed="400">
                                                <?php if(auth()->guard()->guest()): ?>
                                                    <a href="javascript:void(0);" onclick="toastr.info('To add Favorite List. You need to login first.','Info',{
                                                                           closeButton: true,
                                                                           progressBar: true,
                                                                       })" class="btn btn-dark mr-2"><i
                                                            class="icon-heart3"></i> <span>
                                                            (<?php echo e($relProduct->favorite_to_users->count()); ?>)</span></a>
                                                <?php else: ?>
                                                    <a href="javascript:void(0);"
                                                        onclick="document.getElementById('favorite-form-<?php echo e($relProduct->id); ?>').submit();"
                                                        class="<?php echo e(!Auth::user()->favorite_product->where('pivot.product_id', $relProduct->id)->count() == 0
    ? 'favorite_posts'
    : ''); ?>"><i
                                                            class="icon-heart3"></i><span class="text-dark">(<span
                                                                class="favorite_posts"><?php echo e($relProduct->favorite_to_users->count()); ?></span>)</span></a>

                                                    <form id="favorite-form-<?php echo e($relProduct->id); ?>" method="POST"
                                                        action="<?php echo e(route('client.favorite', $relProduct->id)); ?>"
                                                        style="display: none;">
                                                        <?php echo csrf_field(); ?>
                                                    </form>
                                                <?php endif; ?>
                                                <a href="" data-toggle="modal" data-target=".bd-example-modal-lg"
                                                    onclick="productDetailsModal(<?php echo e($relProduct->id); ?>)"
                                                    class="btn btn-dark"><i class="icon-line-expand"></i></a>
                                            </div>
                                            <div class="bg-overlay-bg bg-transparent"></div>
                                        </div>
                                    </div>
                                    <div class="product-desc center">
                                        <div class="product-title">
                                            <h3><a
                                                    href="<?php echo e(route('client.showProductDetails', ['slug' => $relProduct->product_slug])); ?>"><?php echo $relProduct->product_title; ?></a>
                                            </h3>
                                        </div>
                                        <div class="product-price">
                                            <?php if($relProduct->product_price != $relProduct->product_selling_price): ?>
                                                <del>&#2547;
                                                    <?php echo e($relProduct->product_selling_price); ?></del>
                                            <?php endif; ?><ins>&#2547;
                                                <?php echo e($relProduct->product_price); ?></ins>
                                        </div>
                                        <div class="product-rating">
                                            <?php
                                                $arr = $relProduct->rating;
                                                $sum = 0;
                                                foreach ($arr as $item) {
                                                    $sum += $item['star_reating'];
                                                }

                                                if (count($arr) > 0) {
                                                    $average = $sum / count($arr);
                                                    $ratingValue = round(intval($average));
                                                } else {
                                                    $ratingValue = 0;
                                                }
                                            ?>
                                            <?php if($ratingValue > 0): ?>
                                                <?php for($i = 0; $i < $ratingValue; $i++): ?>
                                                    <i class="icon-star3"></i>
                                                <?php endfor; ?>
                                                <?php
                                                    $emptyValue = 5 - $ratingValue;
                                                ?>
                                                <?php for($i = 0; $i < $emptyValue; $i++): ?>
                                                    <i class="icon-star-empty"></i>
                                                <?php endfor; ?>
                                            <?php else: ?>
                                                <i class="icon-star-empty"></i>
                                                <i class="icon-star-empty"></i>
                                                <i class="icon-star-empty"></i>
                                                <i class="icon-star-empty"></i>
                                                <i class="icon-star-empty"></i>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                </div>

            </div>
        </div>
    </section><!-- #content end -->




    <?php echo $__env->make('client.component.Modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script>
        const facebookBtn = document.querySelector(".facebook-btn");
        const twitterBtn = document.querySelector(".twitter-btn");
        const pinterestBtn = document.querySelector(".pinterest-btn");
        const linkedinBtn = document.querySelector(".linkedin-btn");
        const whatsappBtn = document.querySelector(".whatsapp-btn");

        function init() {
            const pinterestImg = document.querySelector(".pinterest-img");

            let postUrl = encodeURI(document.location.href);
            let postTitle = encodeURI("Hi everyone, please check this out: ");
            let postImg = encodeURI(pinterestImg.src);

            facebookBtn.setAttribute(
                "href",
                `https://www.facebook.com/sharer.php?u=${postUrl}`
            );

            twitterBtn.setAttribute(
                "href",
                `https://twitter.com/share?url=${postUrl}&text=${postTitle}`
            );

            pinterestBtn.setAttribute(
                "href",
                `https://pinterest.com/pin/create/bookmarklet/?media=${postImg}&url=${postUrl}&description=${postTitle}`
            );

            linkedinBtn.setAttribute(
                "href",
                `https://www.linkedin.com/shareArticle?url=${postUrl}&title=${postTitle}`
            );

            whatsappBtn.setAttribute(
                "href",
                `https://wa.me/?text=${postTitle} ${postUrl}`
            );
        }

        init();




        $(function() {

            $("#rateYo").rateYo({

                rating: 5.00,
                spacing: "5px",
                halfStar: true,
                multiColor: {

                    "startColor": "#FF0000", //RED
                    "endColor": "#00FF00" //GREEN
                }
            });

        });






        $('#reating').submit(function(e) {
            e.preventDefault();
            var $rateYo = $("#rateYo").rateYo();
            var rating = $rateYo.rateYo("rating");
            var review = $('#massage').val();
            var product_id = $('#product_id').val();



            if (review.length == 0) {

                $('#massage').focus();
                var html = "";

                html += '<p class="text-capitalize" style="color:red">Please Type Your Review *</p>';

                $('#reviewEmpty').html(html,
                    setTimeout(function() {
                        $('#reviewEmpty').html("Your Review <span style='color:red'> *</span>");
                    }, 3000)
                );


            } else {
                axios.post("<?php echo e(route('clint.reatingReview')); ?>", {
                    rating: rating,
                    review: review,
                    product_id: product_id
                }).then(function(response) {


                    if (response.data) {

                        var html = "";

                        html +=
                            '<div class="alert alert-success" role="alert"><p class="text-capitalize">Thanks for your rate and review.</p></div>';

                        $('#messegeview').html(html,
                            setTimeout(function() {
                                $('#messegeview').html("");
                            }, 5000)
                        );

                        $('#reating')[0].reset();
                        getReviewData();

                    } else {
                        html += '<div class="alert alert-danger" role="alert">Incomplete Review</div>';

                        $('#messegeview').html(html,
                            setTimeout(function() {
                                $('#messegeview').html("");
                            }, 5000)
                        );

                    }
                }).catch(function(error) {
                    console.log(error);
                })
            }

        });


        $(document).ready(function() {
            getReviewData();
        });




        function getReviewData() {
            var product_id = $('#product_id').val();
            axios.post("<?php echo e(route('getproductreating')); ?>", {
                product_id: product_id
            }).then(function(respones) {

                var jsonData = respones.data.review;
                $('#reviewCount').html(jsonData.length);
                var html = "";
                for (let rv = 0; rv < jsonData.length; rv++) {
                    const element = jsonData[rv];
                    var date = new Date(element.review_date);
                    var convertedDate = date.toLocaleDateString('es-ES');
                    var reviewData = element.product_review.substring(0, 200).replace(/\r?\n/g, '<br />');
                    var userImage = element.image != null ? element.image : window.location.protocol + "//" + window
                        .document.location.host + "/default-image.png";


                    html += '<li>';
                    html += '<div class="media">';
                    html += '<div class="media-left">';
                    html += '<a href="#"><img class="media-object" src="' + userImage +
                        '" alt="Profile Image" style=" border-radius:50%; width:100px; height:100px;"></a>';
                    html += '</div>';
                    html += '<div class="media-body">';
                    html += '<h4 class="media-heading"><strong>' + element.name + '</strong> - <span> ' +
                        convertedDate + ' </span></h4>';
                    html += '<div class="aa-product-rating' + rv + '" style="padding:0px"> </div>';
                    html += '<p>' + reviewData + '</p>';
                    html += '</div>';
                    html += '</div>';
                    html += '</li>';
                }

                $('#reviewResult').html(html);
                for (let rate = 0; rate < jsonData.length; rate++) {
                    const element2 = jsonData[rate];

                    $(".aa-product-rating" + rate).rateYo({
                        rating: element2.star_reating,
                        readOnly: true,
                        starWidth: "15px"
                    });
                }
            }).catch(function(error) {
                console.log(error);
            });
        }


















        getcartData()

        function getcartData() {

            axios.get("<?php echo e(route('client.cartData')); ?>")
                .then(function(response) {

                    if (response.status = 200) {
                        var dataJSON = response.data;
                        var cartData = dataJSON.cart;

                        var a = Object.keys(cartData).length;


                        $("#cart_quantity").html(a);
                        var tp = parseFloat(dataJSON.total).toFixed(2);
                        $("#total_cart_price").html(' &#2547; ' + tp);

                        var imageViewHtml = "";
                        $.each(cartData, function(i, item) {
                            imageViewHtml +=
                                `<div class="top-cart-item">
                                                                                                                                                                         <div class="top-cart-item-image">
                                                                                                                                                                             <a href="#"><img src="${cartData[i].image}"
                                                                                                                                                                                     alt="Blue Round-Neck Tshirt" /></a>
                                                                                                                                                                         </div>
                                                                                                                                                                         <div class="top-cart-item-desc">
                                                                                                                                                                             <div class="top-cart-item-desc-title">
                                                                                                                                                                                 <a href="#">${cartData[i].title}</a>
                                                                                                                                                                                 <span class="top-cart-item-price d-block"> ${cartData[i].quantity} x &#2547; ${cartData[i].unit_price}</span>
                                                                                                                                                                             </div>
                                                                                                                                                                             <div class="top-cart-item-quantity"><button class="cartDeleteIcon" data-id="${i}" type="submit"><i class="icon-remove"> </i></button></div>
                                                                                                                                                                         </div>
                                                                                                                                                                </div>`
                        });


                        $('.top-cart-items').html(imageViewHtml);



                        if (a == 0) {
                            $("#HeaderPreview").css("display", "none");
                        } else {
                            $("#HeaderPreview").css("display", "block");
                        }


                        //Carts click on delete icon
                        $(".cartDeleteIcon").click(function() {
                            var id = $(this).data('id');
                            $('#CartsDeleteId').html(id);
                            DeleteDataCart(id);
                        })
                    } else {
                        toastr.error('Something Went Wrong', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                    }
                }).catch(function(error) {

                    toastr.error('Something Went Wrong...', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                });
        }












        $('#confirmDeleteCart').click(function() {


            alert("hello")
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
                        toastr.success('Cart Removed Success.', 'Success',{
            closeButton: true,
            progressBar: true,
        });
                        getcartData();
                    } else {
                        toastr.error('Something Went Wrong', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                    }
                }).catch(function(error) {

                    toastr.error('Something Went Wrong......', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                });
        }








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

                if (response.status == 200 && response.data == 1) {
                    $('.bd-example-modal-lg').modal('hide');
                         toastr.success('Product Add Successfully', 'Success',{
            closeButton: true,
            progressBar: true,
        });
                    getcartData()
                } else {
                    toastr.error('Product not Added ! Try Again', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                }

            }).catch(function(error) {
                toastr.error('Product not Added  ! Try Again');
            })


        })


        $('#cartForm2').on('submit', function(event) {
            event.preventDefault();
            let formData = $(this).serializeArray();

            let quantity = formData[0]['value'];
            let product_ids = formData[1]['value'];
            let note1 = formData[2]['value'];
            let note2 = formData[3]['value'];
            let color = formData[4]['value'];
            let meserment = formData[5]['value'];
            console.log(formData);
            let url = "<?php echo e(route('client.addCart')); ?>";
            axios.post(url, {
                meserment: meserment,
                color: color,
                quantity: quantity,
                product_id: product_ids,
                note2: note2,
                note1: note1,
            }).then(function(response) {

                if (response.status == 200 && response.data == 1) {
                    $('.bd-example-modal-lg').modal('hide');
                         toastr.success('Product Add Successfully', 'Success',{
            closeButton: true,
            progressBar: true,
        });
                    getcartData()
                } else {
                    toastr.error('Product not Added ! Try Again', 'Error',{
            closeButton: true,
            progressBar: true,
        });
                }

            }).catch(function(error) {
                toastr.error('Product not Added  ! Try Again');
            })


        })


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecom-final\resources\views/client/pages/ProductDetails.blade.php ENDPATH**/ ?>