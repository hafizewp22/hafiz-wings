@extends('layouts.mainlayout')

@section('title', 'Report Penjualan')

@section('content')
    <div class="d-flex justify-content-end">
        <a href="/" class="me-3">
            Back
        </a>
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
        <button type="button" class="position-absolute start-50 translate-middle btn btn-sm btn-secondary rounded-pill"
            style="width: 2rem; height:2rem;"></button>
        <button type="button" class="position-absolute start-100 translate-middle btn btn-sm btn-primary rounded-pill"
            style="width: 2rem; height:2rem;"></button>
    </div>
    <div class="mt-5"></div>

    <div>
        <h3 class="text-center fw-bold">Report Penjualan</h3>
    </div>

    <a href="/report-detail" target="_blank" rel="noopener noreferrer">
        <button class="btn btn-info form-control text-light">DETAIL</button>
    </a>

@endsection
