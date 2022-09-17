<?php

require "vendor/autoload.php";

$stripe = new \Stripe\StripeClient(
  'sk_test_51LgIRFGAOq0pe7zJeG6YHiZutOOhgtECPd5G2cwCUjwFH5tXIemPcmbXT8KzxkU0XfYlBkuSWYqS7IS0AfSBdGNx00Q0MrRkA5'
);
$product = $stripe->products->retrieve(
	'prod_MP8l9jcNEKVqsl',
	[]
);
$price = $stripe->prices->retrieve('price_1LgKU0GAOq0pe7zJlRPeWIaW',[]);
#echo '<pre>';
#var_dump($product);
#var_dump($price);
#echo '</pre>';
?><!DOCTYPE html>
<html>
  <head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Work+Sans:wght@800&display=swap');
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body {
            padding: 15px;
        }
        .container {
            margin: 20px auto;
            max-width: 1000px;
            background-color: white;
            padding: 0;
        }
        .form-control {
            height: 25px;
            width: 150px;
            border: none;
            border-radius: 0;
            font-weight: 800;
            padding: 0 0 5px 0;
            background-color: transparent;
            box-shadow: none;
            outline: none;
            border-bottom: 2px solid #ccc;
            margin: 0;
            font-size: 14px;
        }
        .form-control:focus {
            box-shadow: none;
            border-bottom: 2px solid #ccc;
            background-color: transparent;
        }
        .form-control2 {
            font-size: 14px;
            height: 20px;
            width: 55px;
            border: none;
            border-radius: 0;
            font-weight: 800;
            padding: 0 0 5px 0;
            background-color: transparent;
            box-shadow: none;
            outline: none;
            border-bottom: 2px solid #ccc;
            margin: 0;
        }
        .form-control2:focus {
            box-shadow: none;
            border-bottom: 2px solid #ccc;
            background-color: transparent;
        }
        .form-control3 {
            font-size: 14px;
            height: 20px;
            width: 30px;
            border: none;
            border-radius: 0;
            font-weight: 800;
            padding: 0 0 5px 0;
            background-color: transparent;
            box-shadow: none;
            outline: none;
            border-bottom: 2px solid #ccc;
            margin: 0;
        }
        .form-control3:focus {
            box-shadow: none;
            border-bottom: 2px solid #ccc;
            background-color: transparent;
        }
        p {
            margin: 0;
        }
        img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        .textmuted {
            color: #6c757d;
            font-size: 20px;
        }
        .fs-14 {
            font-size: 14px;
        }
        .btn.btn-primary {
            width: 100%;
            height: 55px;
            border-radius: 0;
            padding: 13px 0;
            background-color: black;
            border: none;
            font-weight: 600;
        }
        .btn.btn-primary:hover .fas {
            transform: translateX(10px);
            transition: transform 0.5s ease
        }
        .fw-900 {
            font-weight: 900;
        }
        ::placeholder {
            font-size: 12px;
        }
        .ps-30 {
            padding-left: 30px;
        }
        .h4 {
            font-family: 'Work Sans', sans-serif !important;
            font-weight: 800 !important;
        }
        .textmuted,
        h5,
        .text-muted {
            font-family: 'Poppins', sans-serif;
        }
        #checkout-button{
            margin-top:30%;
        }
    </style>
    <title>Buy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <script src="https://js.stripe.com/v3/"></script>
  </head>
  <body style="background-color: #87CEEB;">
  <div class="container">
    <div class="row m-0 bg-light">
        <div class="row m-0">
            <div class="col-lg-7 pb-5 pe-lg-5">
                <div class="row">
                    <div class="col-12 p-5">
                    <img src="<?php echo array_pop($product->images); ?>" alt="<?php echo $product->name; ?>" />
                    </div>
                </div>
            </div>
            <div class="col-lg-5 p-0 ps-lg-4">
                <div class="row m-0">
                    <div class="col-12 px-4">
                        <div class="d-flex align-items-end mt-4 mb-2">
                            <p class="h2 m-0"><span class="pe-1"><?php echo $product->name; ?></span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted"><?php echo $product->description; ?></p>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <p class="textmuted fw-bold">Total</p>
                            <div class="d-flex align-text-top">
                                <span class="fas fa-dollar-sign mt-1 pe-1 fs-14 "></span><span class="h4"><?php echo strtoupper($price->currency); ?> <?php echo $price->unit_amount_decimal; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0">
                        <div class="row bg-light m-0">
                            <div class="col-12 px-4 my-4">
                            </div>
                        </div>
                        <form action="/stripe/create-checkout-session.php" method="POST">
                        <button type="submit" class="btn btn-primary mb-2"id="checkout-button">Check Out</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>
