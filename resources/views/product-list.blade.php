@extends('layouts.mainlayout')

@section('title', 'Product List')

@section('content')
    <div class="d-flex justify-content-end">
        <a href="logout" class="me-3">
            Logout
        </a>
    </div>

    <div class="position-relative mt-4 m-3">
        <div class="progress" style="height: 1px;">
            <div class="progress-bar" role="progressbar" style="width: 0%;"></div>
        </div>
        <button type="button" class="position-absolute  start-0 translate-middle btn btn-sm btn-primary rounded-pill"
            style="width: 2rem; height:2rem;"></button>
        <button type="button" class="position-absolute start-50 translate-middle btn btn-sm btn-secondary rounded-pill"
            style="width: 2rem; height:2rem;"></button>
        <button type="button" class="position-absolute start-100 translate-middle btn btn-sm btn-secondary rounded-pill"
            style="width: 2rem; height:2rem;"></button>
    </div>
    <div class="mt-5"></div>

    @foreach ($products as $item)
        <li class="list-group-item">
            <div class="row g-0">
                <div class="rounded col-sm-6 col-md-2 mt-3">
                    <div
                        class="p-3 mb-4 bg-info text-dark rounded col-6 d-flex flex-column justify-content-center box-images">
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 m-2">
                    <a href="product-detail/{{ $item->product_code }}" class="h5">
                        {{ $item->product_name }}
                    </a>

                    <div class="h6">
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

                    <div class="h6 text-muted">
                        @if ($item->discount != 0)
                            <h6>@currency($setelahDiskon)</h6>
                        @else
                            <h6 class="text-white">-</h6>
                        @endif
                    </div>
                </div>
                <div class="col-6 col-md-1 m-3">
                    <button class="btn btn-info d-flex text-light">BUY</button>
                </div>
            </div>
        </li>
    @endforeach

    <div class="mt-4">
        <a href="/checkout">
            <button type="button" class="btn btn-info form-control text-light">
                CHECKOUT
            </button>
        </a>
    </div>

@endsection
