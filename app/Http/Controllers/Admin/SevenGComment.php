<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Asset\Emails;
use App\Models\AcquisitionCms;
use App\Models\AcquisitionOpportunityCms;
use App\Models\GapAssetType;
use Illuminate\Support\Facades\Storage;

class SevenGComment extends Controller
{   
    
    public function emails()
    {
        $mail = Emails::where('section', 'improve_status')->first();
        return view('admin.front.emails', compact('mail'));
    }

    public function welcome()
    {
        $mail = Emails::where('section', 'welcome')->first();
        return view('admin.front.welocme_email', compact('mail'));
    } 

    public function recommendation()
    {
        $mail = Emails::where('section', 'recommendation')->first();
        return view('admin.front.recommendation_email', compact('mail'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acquisition = AcquisitionCms::all();
        return view('admin.front.analytics', compact('acquisition'));
    }

    public function storeAcquisitionCms(Request $request, $braid)
    {
        
        $this->validate($request, [
            'description' => 'required|between:20,512',
            'fullname' => 'required|between:4,52',
        ]);
        
        $acquisition = AcquisitionCms::where('name', $braid)->first();

        $acquisition->fullname = $request->fullname;
        $acquisition->description = $request->description;
        if($request->hasFile(['photo'])){
            $ext = $request->file('photo')->extension();
            $filename = sha1(time()). rand(100000, 999999) . '.'.$ext;
            $year = date('Y');
            $ref_path  = "public/admin/$year";
            $upload_path = $request->file('photo')->storeAs($ref_path, $filename);

            if($acquisition->photo){ 
                Storage::delete($acquisition->photo);
            }
            $acquisition->photo  = $upload_path;  
        }
        $acquisition->update();

        return redirect()->back()->with('success', 'Asset Acquisition has been updated');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_emails(Request $request)
    {
        $this->validate($request, [
            'section' => 'required',
            'subject' => 'required|string|min:5|max:50',
            'message' => 'required|string|min:10',
        ]);
        
        if($request->section == "zikmhsjiknsi883wibszjxm93jwihknsjhdsddx"){
            $mail = Emails::where('section', 'improve_status')->first();
            $mail->subject = $request->subject;
            $mail->message = $request->message;
            $mail->save();
        }

        if($request->section == "jhsbjsmbzjhbdnxjhmzbhjmbxjbxhibszjxm93jwihknsjhdsddx"){
            $mail = Emails::where('section', 'recommendation')->first();
            $mail->subject = $request->subject;
            $mail->message = $request->message;
            $mail->save();
        }

        if($request->section == "zjhnakmnxjbnajdmbxjbxhibszjxm93jwihknsjhdsddx"){
            $mail = Emails::where('section', 'welcome')->first();
            $mail->subject = $request->subject;
            $mail->message = $request->message;
            $mail->save();
        }

        return redirect()->back();
    }

    
    public function products()
    {
        $acquisition = AcquisitionOpportunityCms::all();
        return view('admin.front.products', compact('acquisition'));
    }
    
    public function storeProducts(Request $request, $asset)
    {
        $this->validate($request, [
            'fullname' => 'required|between:4,52',
            'country' => 'required|between:4,52',
            'capital' => 'required|between:4,52',
            'roi' => 'required|between:4,52',
        ]);
        
        $acquisition = AcquisitionOpportunityCms::where('category', $asset)->first();

        $acquisition->fullname = $request->fullname;
        $acquisition->capital = $request->capital;
        $acquisition->country = $request->country;
        $acquisition->roi = $request->roi;
        if($request->hasFile(['photo'])){
            $ext = $request->file('photo')->extension();
            $filename = sha1(time()). rand(100000, 999999) . '.'.$ext;
            $year = date('Y');
            $ref_path  = "public/admin/$year";
            $upload_path = $request->file('photo')->storeAs($ref_path, $filename);

            if($acquisition->photo){ 
                Storage::delete($acquisition->photo);
            }
            $acquisition->photo  = $upload_path;  
        }
        $acquisition->update();

        return redirect()->back()->with('success', 'Asset Acquisition Opportunities has been updated');
    }
}
