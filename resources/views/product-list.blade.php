<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Checkout Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<style>
    .main {
        height: 100vh;
        box-sizing: border-box;
    }

    .login-box {
        width: 500px;
        border: solid 1px;
        padding: 30px;
    }

    form div {
        margin-bottom: 15px;
    }

    .circle {
        background-color: #0daed8;
        height: 40px;
        width: 40px;
        border-radius: 50%;
        margin: 0 15px;
        margin-block-end: 30px
    }

    .notCircle {
        background-color: #7e8688;
        height: 40px;
        width: 40px;
        border-radius: 50%;
        margin: 0 15px;
        margin-block-end: 30px
    }
</style>

<body>
    <div class="main d-flex flex-column justify-content-center align-items-center">
        @if (session('status'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
        @endif
        <div class="login-box">
            <div>
                <ul class="">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="circle"></div>
                        </div>
                        <div class="col-sm-4">
                            <div class="notCircle"></div>
                        </div>
                        <div class="col-sm-4">
                            <div class="notCircle"></div>
                        </div>
                    </div>

                    @foreach ($products as $item)
                        <li class="list-group-item">
                            <div class="row g-0">
                                <div class="rounded col-sm-6 col-md-2 mt-3">
                                    <div
                                        class="p-3 mb-4 bg-info text-dark rounded w-100 h-75 col-6 d-flex flex-column justify-content-center">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 m-2">
                                    <div>{{ $item->product_name }}</div>

                                    <div>
                                        @if ($item->discount == 0)
                                            @currency($item->price)
                                        @else
                                            <del>@currency($item->price)<del>
                                        @endif
                                    </div>


                                    <?php
                                    $persen = $item->discount / 100;
                                    $diskon = $persen * $item->price;
                                    $setelahDiskon = $item->price - $diskon;
                                    ?>

                                    <div>
                                        @if ($item->discount != 0)
                                            <h6> @currency($setelahDiskon)</h6>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6 col-md-1 m-3">
                                    <button class="btn btn-info d-flex text-light">BUY</button>
                                </div>
                            </div>
                        </li>
                    @endforeach

                    <div class=" mt-4">
                        <button type="button" class="btn btn-info form-control text-light">CHECKOUT</button>
                    </div>

                </ul>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
