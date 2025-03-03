@extends('layouts.app')

@section('title', 'Nạp tiền vào game')

@section('content')
<div class="flex flex-col md:flex-row gap-6">
    <!-- left-->
    <div class="flex-1">
        @include('components.payment-infor')
    </div>

    <!--image-->
    <div class="w-2 flex flex-col justify-between items-center h-full hidden sm:flex">
        <img src="assets/image/iconspac.png" alt="Separator" class="h-full object-contain">
        <img src="assets/image/iconspac.png" alt="Separator" class="h-full object-contain -mt-2">
        <img src="assets/image/iconspac.png" alt="Separator" class="h-full object-contain -mt-2">
    </div>
    <!-- right-->
    <div class="w-full md:w-[350px] border shadow rounded-lg p-5 self-start">
        <div class="m-5">@include('components.payment-head')</div>
        <div class="bg-gray-100 -m-5 p-5">@include('components.payment-methods')</div>
        <div class="pt-3">@include('components.payment-tutal')</div>
    </div>
</div>
@endsection
