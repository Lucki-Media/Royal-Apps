@extends('layouts/contentNavbarLayout')

@section('title', 'Royal Apps | Dashboard')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-8 mb-4 order-0">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-sm-7">
          <div class="card-body">
            <h5 class="card-title text-primary">Congratulations 🎉</h5>
            <p class="mb-4">You're logged in as <span class="fw-bold">{{Auth::user()->email}}</span></p>
          </div>
        </div>
        <div class="col-sm-5 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-4">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Total Revenue -->
</div>

@endsection
