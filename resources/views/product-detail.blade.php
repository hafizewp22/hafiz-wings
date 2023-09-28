@extends('layouts.mainlayout')

@section('title', 'Product Detail')

@section('content')
    <li class="list-group-item">
        <div class="d-flex justify-content-end">
            <a href="/" class="me-3">
                Back
            </a>
            <a href="logout" class="me-3">
                Logout
            </a>
        </div>

        <div class=" mt-3">
            <h3 class="text-center fw-bold">PRODUCT DETAIL</h3>
        </div>

        @if (session('success'))
            <div class="alert alert-success mt-5">
                {{ session('success') }}
            </div>
        @endif

        <div class="row g-0 mt-4">
            <div class="rounded col-sm-6 col-md-3 mt-3">
                <div
                    class="p-3 mb-4 bg-info text-dark rounded  col-6 d-flex flex-column justify-content-center box-images-detail">
                </div>
            </div>
            <div class="col-sm-6 col-md-8 mi">
                <div class="h2">{{ $products->product_name }}</div>

                <div class="h5">
                    @if ($products->discount == 0)
                        @currency($products->price)
                    @else
                        <del>@currency($products->price)<del>
                    @endif
                </div>

                <?php
                $persen = $products->discount / 100;
                $diskon = $persen * $products->price;
                $setelahDiskon = $products->price - $diskon;
                ?>

                <div class="h6 text-muted">
                    @if ($products->discount != 0)
                        <h6>@currency($setelahDiskon)</h6>
                    @else
                        -
                    @endif
                </div>

                <div class="h6 mt-3">Dimension: {{ $products->dimension }}</div>
                <div class="h6 mt-3">Price Unit: {{ $products->unit }}</div>

                <form action="{{ route('addToCart') }}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $products->id }}">
                    <button class="h6 mt-4 btn btn-info d-flex text-light">BUY</button>
                </form>
            </div>

            <div class="d-flex justify-content-center row">
                @foreach ($nextProduct as $item)
                    <div class="col-sm-1">
                        <a href="/product-detail/{{ $item->product_code }}">
                            <div class="@if ($products->id == $item->id) npCircle @else npNotCircle @endif">
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </li>
@endsection
