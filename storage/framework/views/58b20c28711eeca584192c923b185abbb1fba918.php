
<?php $__env->startSection('title', 'Password Recover'); ?>
<?php $__env->startSection('css'); ?>

<style>
    .aa-login-form input[type="email"], .aa-login-form input[type="number"]{
    border: 1px solid #ccc;
    font-size: 16px;
    height: 40px;
    margin-bottom: 15px;
    padding: 10px;
    width: 100%;
    }
}
</style>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

 <!-- catg header banner section -->

  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="mt-5">
            <div class="row">
              <div class="col-md-8 offset-md-2">
                <?php echo $__env->make('client.component.Message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('client.component.ErrorMessage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php if($user): ?>
                <div class="aa-myaccount-register">
                 <h4>Hello, Mr. <?php echo e($user->name); ?>.... <br> Please Reset Your Password</h4>



                  <form id="login-form" name="login-form" class="row" action="<?php echo e(route('client.updatePassword')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="col-12">
                        <h3>Login to your Account</h3>
                    </div>

                    <div class="col-12 form-group">
                        <label for="login-form-username">Username:</label>
                        <input type="email"  readonly id="login-form-username" name="email"  value="<?php echo e($user->email); ?>" class="form-control" />
                    </div>

                    <div class="col-12 form-group">
                        <label for="login-form-password">New Password:</label>
                        <input required type="password" id="login-form-password" name="password" value="" class="form-control" />
                    </div>
                    <div class="col-12 form-group">
                        <label for="login-form-password">Confirm Password:</label>
                        <input  required type="password" id="login-form-password" name="password_confirmation" value="" class="form-control" />
                    </div>

                    <div class="col-12 form-group">
                        <button class="btn btn-secondary m-0" id="login-form-submit" name="login-form-submit" value="login">Reset Password</button>
                        <div class="float-right">
                            <a href="<?php echo e(route('client.registration')); ?>" class="d-block text-primary p-1">Register now! </a>
                        </div>

                    </div>


                </form>
                </div>

                <?php endif; ?>
              </div>
            </div>
            <div class="row">

            </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>

<script>







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
                $.each(cartData, function (i, item) {

                    imageViewHtml += '<li>';
                    imageViewHtml += '<a class="aa-cartbox-img" href="#"><img src=" ' + cartData[i].image +
                        ' " alt="img"></a>';
                    imageViewHtml += '<div class="aa-cartbox-info"> <h4><a href="#">' + cartData[i].title +
                        '</a> </h4> <p>' + cartData[i].quantity + ' x &#2547; ' + cartData[i].unit_price +
                        '</p>  </div>';
                    imageViewHtml += '<div class="aa-remove-product"><button class="cartDeleteIcon" data-id=' +
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

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecom-final\resources\views/client/pages/RecoverPassword.blade.php ENDPATH**/ ?>