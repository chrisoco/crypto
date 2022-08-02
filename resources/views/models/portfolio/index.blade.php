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

        <!-- Optional Purchase Amount: -->
        <button type="button" class="glow-on-hover btn btn-success btn-lg mx-auto d-block my-3"
        data-bs-toggle="collapse" data-bs-target="#collapseExtraDetails" 
        aria-expanded="{{ $errors->any() && old('stk') > 0 ? 'true' : 'false' }}" aria-controls="collapseExtraDetails">Show Purchase Details</button>

        <div class="collapse @if($errors->any()) @error('stk') show @enderror @error('sel_ex_id') show @enderror @endif" id="collapseExtraDetails">
            <div class="card card-body">

                <!-- Purchase -->    

                <x-forms.input.number name="stk" title="Amount" value="{{ old('stk') }}" min="0" max="10000000000" step=".0000000001" placeholder="0.000000001" required="false" />
                
                <x-forms.input.select-ex />

            </div>
        </div>

        <button class="glow-on-hover btn btn-success btn-lg mx-auto d-block mb-3" type="submit">Add Coin</button>

    </form>
        
    </div>
@endsection
