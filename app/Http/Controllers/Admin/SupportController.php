<?php

namespace App\Http\Controllers\Admin;

use App\Models\UserFeedback;
use App\Models\GaphubGuide;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function feedbacks()
    {
        $feedbacks = UserFeedback::latest()->paginate(10);
        // var_dump($feedbacks[0]->user);
        return view('admin.reports.feedbacks', compact('feedbacks'));
    }


    public function replyFeedback(Request $request,  $id){
        $this->validate($request, [
            'reply' => 'required|max:512'
        ]);

        $feedback = UserFeedback::find($id)->update([ 'extra' => $request->reply ]);

        return redirect()->back();
    }

    public function index()
    {
        return view('admin.support.index');
    }

    public function quickstart()
    {
        $guides = GaphubGuide::latest()->paginate(10);

        return view('admin.support.guide', compact('guides'));
    }

    public function storeQuickstart(Request $request){

        $this->validate($request, [
            'title' => 'required',
            'video_link' => 'required'
        ]);

        $guide =  GaphubGuide::create($request->all());

        return redirect()->back()->with('success', 'New Quickguide  support has been added to Library ');
    }

    public function showGuide($id)
    {
        $guide = GaphubGuide::find($id);
        $success = true;
        return response()->json(compact('success', 'guide'));
    }

    public function updateQuickStart(Request $request, $id)
    {
        $guide =  GaphubGuide::find($id);

        $this->validate($request, [
            'title' => 'required',
            'video_link' => 'nullable|max:1024'
        ]);

        // $request['status'] = ($request->status == "on") ? 1 : false;

        $guide->update($request->all());

        return redirect()->back()->with('success', "Quickguide support has been updated succesfully");
    }


}
