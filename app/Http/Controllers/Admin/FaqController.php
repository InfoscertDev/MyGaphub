<?php

namespace App\Http\Controllers\Admin;

use App\Models\GapAssetType;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asset_types = GapAssetType::latest()->paginate(20);

        foreach($asset_types as $asset){
            $asset->acqusition = "$asset->acqusition asset";
        }

        return view('admin.support.faq', compact('asset_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'asset_class' => 'required|in:business,risk,appreciating,intellectual,depreciating',
            'asset_name' => 'required',
            'describtion' => 'nullable|max:512'
        ]);

        $asset_type = new GapAssetType();
        $asset_type->acqusition = $request->asset_class;
        $asset_type->name = $request->asset_name;
        $asset_type->description = $request->description;
        $asset_type->save();

        return redirect()->back()->with('success', 'New Asset Type has been added succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asset_type = GapAssetType::find($id);
        $success = true;
        return response()->json(compact('success', 'asset_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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

        $gap =  GapAssetType::find($id);

        $this->validate($request, [
            'acqusition' => 'required|in:business,risk,appreciating,intellectual,depreciating',
            'asset_name' => 'required',
            'describtion' => 'nullable|max:512'
        ]);
        $request['status'] = ($request->status == "on") ? 1 : false;
        $request['name'] = $request->asset_name;

        $gap->update($request->all());

        return redirect()->back()->with('success', 'Asset Type has been updated succesfully');
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
