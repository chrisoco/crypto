@extends('layouts.app')

@section('custom-style')
<style>
    .glow-on-hover {
        width: 400px;
        margin-top: 5px;
        background: gray !important;
    }
</style>
@endsection

@section('content')
    <div class="h1-title text-center">Portfolio</div>
    <div class="container border border-danger">

        <!-- Add New Temp. Crypto -->
        @include('models.coin.create-modal')


        <!-- Get Data From API Button -->
        <button type="button" class="glow-on-hover btn btn-success btn-lg mx-auto d-block">Update Crypto</button>


        <!-- List of Coins -->

        <!-- List of Fav. -->

    </div>
@endsection
