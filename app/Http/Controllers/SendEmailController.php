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

         $isSpam = $this->isSpamTheEmail($request->mensaje);
         $spam = $isSpam;

         // array_push($request->all(), $spam);
         $email = [];

         $email['name'] = $request->name;
         $email['email'] = $request->email;
         $email['asunto'] = $request->asunto;
         $email['mensaje'] = $request->mensaje;
         $email['spam'] = $spam;

         /* Save data DB */
         $email = new Email($email);
         $email->save();
            
         /* Send Email */
			 Mail::to($request->email)->send(new EmailConfirmation($data));
			 return back()->with('success', 'Thanks for contacting us!');
      }

      private function isSpamTheEmail(String $asunto) {
         /* $text = "orem viagra is simply dummy text of the printing and typesetting oferta. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, buy also the leap into electronic typesetting, remaining oferta unchanged. It was ofertas in the 1960s with the release of Letraset sheets containing buy Ipsum passages, and buy recently with desktop publishing software like Aldus PageMaker including versions of viagra Ipsum."; */

         $text = strtolower($asunto);

         $totalAcum = 1;
         $viagra = $oferta = $ofertas = $buy = $contactanos = $tarifas = $stock = 0;

         $viagra = substr_count($asunto, 'viagra'); //5
         if ($viagra > 0) {
            $totalAcum++;
         }

         $oferta = substr_count($asunto, 'oferta'); //4
         if ($oferta > 0) {
            $totalAcum++;
         }

         $ofertas = substr_count($asunto, 'ofertas'); //4
         if ($ofertas > 0) {
            $totalAcum++;
         }

         $buy = substr_count($asunto, 'buy'); //5
         if ($buy > 0) {
            $totalAcum++;
         }

         $contactanos = substr_count($asunto, 'contactanos'); //3
         if ($contactanos > 0) {
            $totalAcum++;
         }

         $tarifas = substr_count($asunto, 'tarifas'); //2
         if ($tarifas > 0) {
            $totalAcum++;
         }

         $stock = substr_count($asunto, 'stock'); //1
         if ($stock > 0) {
            $totalAcum++;
         }

         /* Is Spam? */
         // $isSpam = 0;
         $isSpam = ($viagra + $oferta + $ofertas + $buy + $contactanos + $tarifas + $stock) / $totalAcum;

         if ($isSpam <= 2.5)
            return 0;
         else
            return 1;
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
