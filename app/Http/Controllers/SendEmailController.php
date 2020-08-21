<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Mail\EmailConfirmation;
use App\Email;

class SendEmailController extends Controller
{
		public function index() 
		{
			return \view('emails.index');
		}
		
		public function send(Request $request)
		{
			$this->validate($request, [
				'name'   =>  'required',
				'email'  =>  'required|email',
				'asunto'  =>  'required',
				'mensaje' =>  'required'
			 ]);
	
            $data = array(
                  'name'    =>  $request->name,
                  'message' =>   $request->message,
                  'asunto'  =>    $request->asunto,
                  'mensaje' =>   $request->mensaje
            );

         $email = new Email($request->all());
         $email->save();
         	
			 Mail::to($request->email)->send(new EmailConfirmation($data));
			 return back()->with('success', 'Thanks for contacting us!');
      }
      
      public function showEmail()
      {
         $emails = Email::orderBy('created_at','asc')->get();
         // dd($emails);
         return view('emails.list', compact('emails'));
      }

      public function stadistics()
      {
         $emails = Email::all();

         $countEmail = $emails;

         $count = $emails->groupBy('asunto');

         if (array_key_exists('reclamo', $count->all())) {
            $reclamo = $count->all()['reclamo']->count();
            $reclamoPercent = ($reclamo * 100) / $countEmail->count();
         } else {
            $reclamo = 0;
            $reclamoPercent = 0;
         }

         if (array_key_exists('queja', $count->all())) {
            $queja = $count->all()['queja']->count();
            $quejaPercent = ($queja * 100) / $countEmail->count();
         } else {
            $queja = 0;
            $quejaPercent = 0;
         }

         if (array_key_exists('solicitud', $count->all())) {

            $solicitud = $count->all()['solicitud']->count();
            $solicitudPercent = ($solicitud * 100) / $countEmail->count();
         } else {
            $solicitud = 0;
            $solicitudPercent = 0;
         }
            
         return view('emails.stadistics', compact(
            'countEmail', 
            'reclamo', 
            'queja', 
            'solicitud',
            'reclamoPercent',
            'quejaPercent',
            'solicitudPercent',
            ) 
         );
      }
}
