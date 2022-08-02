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