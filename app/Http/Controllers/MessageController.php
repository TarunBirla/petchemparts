<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\ContactAdminMail;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $messages=Message::paginate(20);
        return view('backend.message.index')->with('messages',$messages);
    }
    public function messageFive()
    {
        $message=Message::whereNull('read_at')->limit(5)->get();
        return response()->json($message);
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
        $this->validate($request,[
            'name'=>'required|min:2',
            'email'=>'email|required',
            'message'=>'required',
            'subject'=>'nullable',
            'phone'=>'nullable'
        ]);

        $inputData = $request->all();
        if (empty($inputData['subject'])) {
            $inputData['subject'] = 'Website General Inquiry';
        }

        $messageRecord = Message::create($inputData);
        
        // Send email notification to Admin (tbirla120@gmail.com)
        $adminEmail = 'mohammednasar.uk@gmail.com';
        try {
            if (config('mail.default') === 'smtp' && empty(env('MAIL_USERNAME'))) {
                config(['mail.default' => 'log']);
            }
            Mail::to($adminEmail)->send(new ContactAdminMail($messageRecord));
        } catch (\Exception $e) {
            Log::error('Contact Form Admin Email Error: ' . $e->getMessage());
        }

        try {
            $data = [
                'url' => route('message.show', $messageRecord->id),
                'date' => $messageRecord->created_at ? $messageRecord->created_at->format('F d, Y h:i A') : date('F d, Y h:i A'),
                'name' => $messageRecord->name,
                'email' => $messageRecord->email,
                'phone' => $messageRecord->phone,
                'message' => $messageRecord->message,
                'subject' => $messageRecord->subject,
            ];
            event(new MessageSent($data));
        } catch (\Exception $e) {
            // Event broadcast fallback
        }

        request()->session()->flash('success', 'Thank you! Your message has been sent successfully. Our team will contact you soon.');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $message=Message::find($id);
        if($message){
            $message->read_at=\Carbon\Carbon::now();
            $message->save();
            return view('backend.message.show')->with('message',$message);
        }
        else{
            return back();
        }
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
        $message=Message::find($id);
        $status=$message->delete();
        if($status){
            request()->session()->flash('success','Successfully deleted message');
        }
        else{
            request()->session()->flash('error','Error occurred please try again');
        }
        return back();
    }
}
