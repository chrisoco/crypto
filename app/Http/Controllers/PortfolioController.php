<?php

namespace App\Http\Controllers;

use App\Models\Exchange;
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

        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'symbol'    => 'required',
            'slug'      => 'nullable',
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

        $validated = $validator->validated();

        ddd($validated);


    }
}
