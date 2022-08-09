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

        $exchange_id  = null;
        $coin         = null;
        $portfolio    = null;
        $stk          = 0;
        $watchlist    = true;

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

            // Get Exchange ID for Portfolio && ammount
            $exchange_id = Exchange::find($request->input('sel_ex_id'))->id;
            $stk = $request->input('stk');
            $watchlist = false;
            
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

        //* Validate if User already has Coin associated
        // Get Portfolio if exists
        $portfolio = Portfolio
            ::where('user_id', auth()->user->id)
            ->where('coin_id', $coin->id)
            ->where('exchange_id', $exchange_id)
            ->first();

        // Else Create -> basicly the same as with Coin above
        if(is_null($portfolio)) {
            $portfolio = Portfolio::create([
                'user_id'     => auth()->user()->id,
                'coin_id'     => $coin->id,
                'exchange_id' => $exchange_id,
                'stk'         => $stk,
                'watchlist'   => $watchlist,
            ]);
        } else {

            // Update STK on Coin
            $portfolio->update([
                'stk' => $stk
            ])->save();
            

            //! Test maybe even test in artisan tinker
            $portfolio->exchange()->attach(Exchange::find($validated['sel_ex_id']));

        }

        // API CALL to create Quote for coin :)
        // TODO: Maybe Create Button to Fetch all Coin Data.

        return ddd($validated);


        // TODO: Create Frontend to View current Portfolio  
        // TODO: && add Button to Update all quote from each Coin

    }
}
