<?php

namespace App\Http\Controllers\API\v2;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reminder;
use Illuminate\Support\Facades\Validator;
use App\FinicialCalculator as Calculator;
use DateTime;

class ReminderAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) 
    {
        $user = $request->user();
        $archive =  $request->get('archive');
        $calculate = Calculator::where('user_id', $user->id)->first();
        $currency = explode(" ", $calculate->currency)[0];

        if($archive){
            $reminders = Reminder::where('user_id', $user->id)->where('complete', '1')
                            ->latest()->paginate(20);
        }else{
            $reminders = Reminder::where('user_id', $user->id)->where('complete', '0')
                                ->latest()->paginate(20);
        }
        foreach ($reminders as $reminder) {
            $alert = new DateTime(date('Y-m-d'));
            $reminder->dueday = $alert->diff(new DateTime($reminder->date)) ;
            $reminder->dueday = $reminder->dueday->days; 
        }
        $data = ['reminders' => $reminders, 'currency' => $currency, 'archive' => $archive];

        return response()->json($data);
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
        Validator::extend('before_or_equal', function($attribute, $value, $parameters, $validator) {
            return strtotime($validator->getData()[$parameters[0]]) >= strtotime($value);
            }, 'Date entered is not correct.');

        $validator = Validator::make($request->all(), [
            'date' => 'date|after:yesterday',
            // 'alert' => 'date|after:yesterday|before_or_equal:date',
            'reminder'  => 'required|max:50',
            'amount' => 'numeric|min:0'
        ],[ 
            'date.after' => 'Date is not correct',
            // 'alert.after' => 'Date is not correct',
            // 'alert.before_or_equal' => 'Date is not correct'
        ]);
        
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $reminder = new Reminder();
        $reminder->user_id = $user->id;
        $reminder->name = $request->reminder;
        $reminder->date = $request->date;
        $reminder->note = $request->note;
        $reminder->amount = $request->amount;
        $reminder->alert = $request->alert;
        $reminder->extra = $request->mode;
        $reminder->due = $request->due;
        $reminder->email = ($request->email) ? 1 : 0;
        $reminder->sms = ($request->sms) ? 1 : 0;
        $reminder->push = ($request->push) ? 1 : 0;
        $reminder->save();  

        return response()->json($reminder);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $user = $request->user();
        $reminder = Reminder::find($id); 
        return response()->json($reminder);
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
        $user = $request->user();

        if ($request->mark == "sygzjsxgvcxbsbdvbvxgvxnbcncff") {
            $reminder = Reminder::findorfail($id);
            $reminder->complete = 1;
            $reminder->save();
            return response()->json($reminder);
        } else {
            Validator::extend('before_or_equal', function($attribute, $value, $parameters, $validator) {
                return strtotime($validator->getData()[$parameters[0]]) >= strtotime($value);
                }, 'Date entered is not correct.');

            $validator = Validator::make($request->all(), [
                'date' => 'date|after:yesterday',
                'alert' => 'date|after:yesterday|before_or_equal:date',
                'reminder'  => 'required|max:50',
                'amount' => 'numeric|min:0'
            ],[
                'date.after' => 'Date is not correct',
                'alert.after' => 'Date is not correct',
                'alert.before_or_equal' => 'Date is not correct'
            ]);
            
            if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
            }

            $reminder = Reminder::find($id);
            $reminder->user_id = $user->id;
            $reminder->name = $request->reminder;
            $reminder->date = $request->date;
            $reminder->note = $request->note;
            $reminder->amount = $request->amount;
            $reminder->alert = $request->alert;
            $reminder->due = $request->due;
            $reminder->email = ($request->email) ? 1 : 0;
            $reminder->sms = ($request->sms) ? 1 : 0;
            $reminder->push = ($request->push) ? 1 : 0;
            if($reminder->complete == 0) $reminder->save();   
            
            return response()->json($reminder);
        }
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
