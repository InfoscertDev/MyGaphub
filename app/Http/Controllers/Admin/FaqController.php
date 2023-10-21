<?php

namespace App\Http\Controllers\Admin;

use App\Models\GaphubFAQ;

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
        $faqs = GaphubFAQ::latest()->paginate(20);

        return view('admin.support.faq', compact('faqs'));
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
            'title' => 'required',
            'describtion' => 'nullable|max:1024'
        ]);

        $faq = new GaphubFAQ();
        $faq->title = $request->title;
        $faq->description = $request->description;
        $faq->save();

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
        $faq = GaphubFAQ::find($id);
        $success = true;
        return response()->json(compact('success', 'faq'));
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

        $gap =  GaphubFAQ::find($id);

        $this->validate($request, [
            'title' => 'required',
            'describtion' => 'nullable|max:1024'
        ]);

        $request['status'] = ($request->status == "on") ? 1 : false;

        $gap->update($request->all());

        return redirect()->back()->with('success', "FAQ's has been updated succesfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gap =  GaphubFAQ::find($id)->delete();

        return redirect()->back()->with('success', "FAQ's has been deleted succesfully");
    }
}
