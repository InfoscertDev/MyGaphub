<?php

namespace App\Http\Controllers\API\v2;

use App\Http\Controllers\Controller;
use App\Models\SaveProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SavePropertyApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();

        $properties = SaveProperty::where('user_id', $user->id)->get();

        return response()->json([
            'status' => true,
            'data' =>  $properties,
            'message' => ""
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->user();

        $validatedData = $request->validate([
            'property_id' => 'required|integer',
        ]);

        $status = Http::get("https://gappropertyhub.com/wp-json/custom-api/propery-details?id={$validatedData['property_id']}&token=");
        $reap = json_decode($status->body(), true);

        $meta = isset($reap[0]) ? json_encode($reap[0]) : null;

        $validatedData['user_id'] = $user->id;

        $saved = SaveProperty::firstOrCreate($validatedData, ['meta' => $meta]);

        return response()->json([
            'status' => true,
            'message' => "Property saved",
            'meta' => $meta,
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
    public function destroy(Request $request, $id)
    {
        $user = $request->user();

        // Find the saved property based on user and property ID
        $savedProperty = SaveProperty::where('user_id', $user->id)
            ->where('id', $id)
            ->first();

        // Check if the saved property exists
        if (!$savedProperty) {
            return response()->json([
                'status' => false,
                'message' => "Saved property not found"
            ], 404);
        }

        // Delete the saved property
        $savedProperty->delete();

        return response()->json([
            'status' => true,
            'message' => "Property removed from saved list"
        ]);
    }
}
