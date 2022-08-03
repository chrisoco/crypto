<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use App\Models\Exchange;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('models.portfolio.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCoin(Request $request)
    {

        $request->merge([
            'symbol' => strtoupper($request->input('symbol'))
        ]);

        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'symbol'    => 'required',
            'stk'       => 'nullable|numeric|min:0',
            'sel_ex_id' => 'nullable|numeric',
        ]);

        if($request->input('stk')) {

            if(is_null(Exchange::find($request->input('sel_ex_id')))) {
                $validator->errors()->add('sel_ex_id', 'Choose a valid Exchange...');
                return back()->withErrors($validator)->withInput();
            }
            
        }

        if($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }


        // TODO: Create Model and fetch Data from Coin API ?
        // ?Maybe just add Coin and impl. Button to fetch all Data at a later stage.
        // !Recheck Coin API Output on fetch by name // what is a symbol/slug

        $validated = $validator->validated();

        $coin = Coin::where('symbol', $validated['symbol'])->first();

        if(is_null($coin)) {
            $coin = Coin::create($validated);
        }


        // Make Portfolio
        return ddd($validated);

        // TODO: Validate if User already has Coin associated
        //? Maybe Allow it so User can have same Coin from Multiple Exchanges?

        if(is_null($request->input('stk'))) {

            $p = Portfolio::create();
            
            
        }

        //! Test maybe even test in artisan tinker
        $p->exchange()->attach(Exchange::find($validated['sel_ex_id']));


        ddd($validated);


    }
}
