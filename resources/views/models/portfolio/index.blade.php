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
        <x-forms.input.text name="name" title="Name" value="{{ old('name') }}" placeholder="Bitcoin" />
        <x-forms.input.text name="symbol" title="Symbol" value="{{ old('symbol') }}" placeholder="BTC" />
        <x-forms.input.text name="slug" title="Slug" value="{{ old('slug') }}" placeholder="??" />

        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
        </div>

    </div>
@endsection
