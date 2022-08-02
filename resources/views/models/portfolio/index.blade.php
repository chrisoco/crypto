@extends('layouts.app')

@section('custom-style')
<style>
    .glow-on-hover {
        width: 400px;
        margin-top: 5px;
        background: gray !important;
    }
    input[type=checkbox] {
    /* Double-sized Checkboxes */
    -ms-transform: scale(2); /* IE */
    -moz-transform: scale(2); /* FF */
    -webkit-transform: scale(2); /* Safari and Chrome */
    -o-transform: scale(2); /* Opera */
    padding: 10px;
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

        <!-- FORM -->
        <!-- TODO: 
        https://getbootstrap.com/docs/5.2/forms/input-group/ 
        https://getbootstrap.com/docs/5.2/forms/floating-labels/
        https://getbootstrap.com/docs/5.2/forms/validation/
        -->

    <form method="POST" action="{{ route('portfolio.coin.store') }}" novalidate>
        @csrf
        @method('POST')

        <x-forms.input.text name="name" title="Name" value="{{ old('name') }}" placeholder="Bitcoin" />
        <x-forms.input.text name="symbol" title="Symbol" value="{{ old('symbol') }}" placeholder="BTC" />
        <x-forms.input.text name="slug" title="Slug" value="{{ old('slug') }}" placeholder="??" required="false"/>

        <x-forms.collapse-add-info />

        <button class="glow-on-hover btn btn-success btn-lg mx-auto d-block mb-3" type="submit">Add Coin</button>

    </form>
        
    </div>
@endsection
