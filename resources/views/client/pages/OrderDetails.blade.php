@extends('client.layouts.app')
@section('css')

    <style>
        .pBtn {
            margin: 20px 0px !important;
            z-index: 999999;
        }

        .pBtn {
            position: fixed;
            top: 200px;
            right: 5px;
            background-color: #FF6666;
            color: #fff;
            padding: 10px;
            border-radius: 20px;
            display: inline-block;
            animation-name: profile-link;
            animation-duration: 2s;
            animation-iteration-count: infinite;
        }

        @keyframes profile-link {
            0% {
                background-color: red;
            }

            50% {
                background-color: #FF6666;
            }

            100% {
                background-color: rgb(228, 122, 23);
            }
        }

    </style>

@endsection

@section('content')
    @if ($orders)
        <div class="container">
            <div class="col-md-10 offset-md-1">
                @auth
                    <div class=" text-center pBtn">
                        <a href="{{ route('client.profile') }}">Go Your Profile</a>
                    </div>
                @endauth
                <h2 class=" profile  text-center mt-3">Order id: {{ $orders->id }}</h2>
                @include('client.component.Message')


                <table class="table table-bordered table-striped table-hover cart mb-5">
                    <thead>
                        <tr>
                            <th class="cart-product-remove">Title</th>
                            <th class="cart-product-thumbnail">Details</th>
                        </tr>
                    </thead>
                    <tbody>


                        <tr class="cart_item">
                            <td class="cart-product-subtotal">
                                <span class="amount">Customer Name:</span>
                            </td>
                            <td class="cart-product-subtotal">
                                <span class="amount">{{ $orders->customer_name }}</span>
                            </td>
                        </tr>

                        <tr class="cart_item">
                            <td class="cart-product-subtotal">
                                <span class="amount">Mobile Number:</span>
                            </td>
                            <td class="cart-product-subtotal">
                                <span class="amount">{{ $orders->customer_phone_number }}</span>
                            </td>
                        </tr>

                        <tr class="cart_item">
                            <td class="cart-product-subtotal">
                                <span class="amount">Address:</span>
                            </td>
                            <td class="cart-product-subtotal">
                                <span class="amount">{{ $orders->address }}</span>
                            </td>
                        </tr>



                        <tr class="cart_item">
                            <td class="cart-product-subtotal">
                                <span class="amount">City:</span>
                            </td>
                            <td class="cart-product-subtotal">
                                <span class="amount">{{ $orders->city }}</span>
                            </td>
                        </tr>

                        <tr class="cart_item">
                            <td class="cart-product-subtotal">
                                <span class="amount">District:</span>
                            </td>
                            <td class="cart-product-subtotal">
                                <span class="amount">{{ $orders->district }}</span>
                            </td>
                        </tr>

                        <tr class="cart_item">
                            <td class="cart-product-subtotal">
                                <span class="amount">Country:</span>
                            </td>
                            <td class="cart-product-subtotal">
                                <span class="amount">{{ $orders->country }}</span>
                            </td>
                        </tr>

                        <tr class="cart_item">
                            <td class="cart-product-subtotal">
                                <span class="amount">Postal Code:</span>
                            </td>
                            <td class="cart-product-subtotal">
                                <span class="amount">{{ $orders->postal_code }}</span>
                            </td>
                        </tr>

                        <tr class="cart_item">
                            <td class="cart-product-subtotal">
                                <span class="amount">Sub Total:</span>
                            </td>
                            <td class="cart-product-subtotal">
                                <span class="amount">{{ $orders->price_without_discount }}</span>
                            </td>
                        </tr>

                        <tr class="cart_item">
                            <td class="cart-product-subtotal">
                                <span class="amount">Discount Amount:</span>
                            </td>
                            <td class="cart-product-subtotal">
                                <span class="amount">{{ $orders->discount_amount }}</span>
                            </td>
                        </tr>

                        <tr class="cart_item">
                            <td class="cart-product-subtotal">
                                <span class="amount">Total (After Discount):</span>
                            </td>
                            <td class="cart-product-subtotal">
                                <span class="amount">{{ $orders->total_amount }}</span>
                            </td>
                        </tr>

                        <tr class="cart_item">
                            <td class="cart-product-subtotal">
                                <span class="amount">Tax:</span>
                            </td>
                            <td class="cart-product-subtotal">
                                <span class="amount">{{ $orders->total_tax }}</span>
                            </td>
                        </tr>

                        <tr class="cart_item">
                            <td class="cart-product-subtotal">
                                <span class="amount">Delivery Charge:</span>
                            </td>
                            <td class="cart-product-subtotal">
                                <span class="amount">{{ $orders->total_delivery_charge }}</span>
                            </td>
                        </tr>

                        <tr class="cart_item">
                            <td class="cart-product-subtotal">
                                <span class="amount">Grand Total:</span>
                            </td>
                            <td class="cart-product-subtotal">
                                <span class="amount">{{ $orders->paid_amount }}</span>
                            </td>
                        </tr>

                        <tr class="cart_item">
                            <td class="cart-product-subtotal">
                                <span class="amount">Delivery Status:</span>
                            </td>
                            <td class="cart-product-subtotal">
                                <span class="amount btn btn-success">{{ $orders->payment_status }}</span>
                            </td>
                        </tr>

                        <tr class="cart_item">
                            <td class="cart-product-subtotal">
                                <span class="amount">Payment Details:</span>
                            </td>
                            <td class="cart-product-subtotal">
                                <span class="amount">{{ $orders->payment_details }}</span>
                            </td>
                        </tr>

                        <tr class="cart_item">
                            <td class="cart-product-subtotal">
                                <span class="amount">Order Issued :</span>
                            </td>
                            <td class="cart-product-subtotal">
                                <span class="amount">{{ date('d-M-Y', strtotime($orders->created_at)) }}</span>
                            </td>
                        </tr>


                    </tbody>

                </table>



            </div>
            <div class="col-md-10 offset-md-1">



                <table class="table table-bordered table-striped table-hover cart mb-5">
                    <thead>
                        <tr>


                            <th class="cart-product-remove">Product Title</th>
                            <th class="cart-product-thumbnail">Quantity</th>
                            <th class="cart-product-name">Color</th>
                            <th class="cart-product-price">Maserment</th>
                            <th class="cart-product-subtotal">Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders->product as $product)
                            @if ($product->product)
                                <tr class="cart_item">




                                    <td class="cart-product-subtotal">
                                        <span class="amount">{{ $product->product->product_title }}</span>
                                    </td>
                                    <td class="cart-product-subtotal">
                                        <span class="amount"> {{ $product->quantity }}</span>
                                    </td>

                                    <td class="cart-product-subtotal">
                                        <span class="amount"
                                            style="display:flex; justify-content:center; align-items: center;">
                                            @if ($product->color)

                                                <div
                                                    style=" width:20px; height:20px; border:1px solid #000; border-radius:50%; background-color: {{ $product->color }};">
                                                </div>
                                            @else
                                                {{ 'N/A' }}
                                            @endif
                                        </span>
                                    </td>


                                    <td class="cart-product-subtotal">
                                        <span class="amount">
                                            @if ($product->maserment)
                                                {{ $product->maserment }}
                                            @else
                                                {{ 'N/A' }}
                                            @endif
                                        </span>
                                    </td>



                                    <td class="cart-product-subtotal">
                                        <span class="amount"> &#2547; {{ number_format($product->price, 2) }}</span>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    @endif
@endsection




@section('script')

    <script>
        getcartData()

        function getcartData() {

            axios.get("{{ route('client.cartData') }}")
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

            axios.post("{{ route('client.cartRemove') }}", {
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

@endsection