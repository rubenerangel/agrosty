<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Exports\MailsExport;
use App\Imports\MailsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Email;

class MyController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new MailsExport, 'Mails.xlsx');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new MailsImport,request()->file('file'));
           
        return back();
    }

    public function exportPDF()
	{
	   $data = Email::get()->toArray();
	   /* return Excel::create('Agrosty', function($excel) use ($data) {
		$excel->sheet('mySheet', function($sheet) use ($data)
	    {
			$sheet->fromArray($data);
	    });
	   })->download("pdf"); */
	}
}