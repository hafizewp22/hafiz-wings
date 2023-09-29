@extends('layouts.mainlayout')

@section('title', 'Checkout')

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
        <button type="button" class="position-absolute  start-0 translate-middle btn btn-sm btn-secondary rounded-pill"
            style="width: 2rem; height:2rem;"></button>
        <button type="button" class="position-absolute start-50 translate-middle btn btn-sm btn-primary rounded-pill"
            style="width: 2rem; height:2rem;"></button>
        <button type="button" class="position-absolute start-100 translate-middle btn btn-sm btn-secondary rounded-pill"
            style="width: 2rem; height:2rem;"></button>
    </div>
    <div class="mt-5"></div>

    <div class="mt-4">
        @foreach ($transactionDetails as $item)
            <input type="hidden" name="product_id" value="{{ $item->id }}">
            <li class="list-group-item product_data">
                <div class="row g-0">
                    <div class="rounded col-sm-6 col-md-2 mt-3">
                        <div
                            class="p-3 mb-4 bg-info text-dark rounded col-6 d-flex flex-column justify-content-center box-images">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 m-2">
                        <div class="h5"> {{ $item->products->product_name }} </div>

                        <div class="h6">
                            {{ $item->quantity }} {{ $item->unit }}
                        </div>

                        <div class="h6 text-muted">
                            Subtotal: @currency($item->sub_total)
                        </div>
                    </div>

                </div>
            </li>
        @endforeach

        <div>
            <h3 class="text-center fw-bold mt-3 h5 border p-2">TOTAL : @currency($sub_total)</h3>
        </div>

        <button type="button" class="btn btn-info form-control text-light mt-4">
            CONFIRM
        </button>
    </div>
@endsection
