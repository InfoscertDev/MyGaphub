<?php

namespace App\Http\Controllers\API\v2;

use App\Http\Controllers\Controller;
use App\Models\FinancialIntelligentHub;
use App\Models\MarketOpportunity;
use Illuminate\Http\Request;

class GapProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function market()
    {
        $user = auth()->user();
        $published = MarketOpportunity::where('is_published', true)->limit(6)->get();

        return response()->json([
            'status' => true,
            'data' => $published,
            'message' => 'Market Opportunity list retrieved succesfully'
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function financialHub(Request $request)
    {
        $user = auth()->user();

        $published = FinancialIntelligentHub::where('is_published', true)->limit(6)->get();

        return response()->json([
            'status' => true,
            'data' => $published,
            'message' => 'Financial Intelligent Hub list retrieved succesfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
