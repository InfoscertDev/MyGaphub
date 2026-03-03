<?php

namespace App\Http\Controllers\Admin;

use App\Models\UserFeedback;
use App\Models\GaphubGuide;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\Request;

use App\Rules\YoutubeUrl;

class SupportController extends Controller
{

    public function index()
    {
        return view('admin.support.index');
    }

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

    public function enquiries()
    {
        $enquiries = Enquiry::latest()->paginate(10);
        // var_dump($enquiry[0]->user);
        return view('admin.reports.enquiries', compact('enquiries'));
    }


    public function quickstart()
    {

        $guides = GaphubGuide::latest()->paginate(10);
        $pattern = '/youtu\.be\/([a-zA-Z0-9_-]{11})/';


        foreach($guides as $guide){
            $stable = preg_match($pattern, $guide->video_link, $matches);
            $guide->video_id = $matches[1] ?? '';
        }

        return view('admin.support.guide', compact('guides'));
    }

    public function storeQuickstart(Request $request){

        $this->validate($request, [
            'title' => 'required',
            'video_link' => ['required', new YoutubeUrl]
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
            'video_link' => ['required', new YoutubeUrl]
        ]);

        // $request['status'] = ($request->status == "on") ? 1 : false;

        $guide->update($request->all());

        return redirect()->back()->with('success', "Quickguide support has been updated succesfully");
    }

    public function deleteQuickstart($id){
        $guide = GaphubGuide::find($id)->delete();
        return redirect()->back()->with('success', "Quickstart guide has been deleted succesfully");
    }

}
