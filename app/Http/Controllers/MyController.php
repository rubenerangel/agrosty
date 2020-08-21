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
    public function export(Request $response) 
    {
        return  Excel::download(new MailsExport, 'Mails.xlsx');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import(Request $request) 
    {
        Excel::import(new MailsImport,request()->file('file'));
        return back();
    }

    public function exportPDF()
	{
	
       return  Excel::download(new MailsExport, 'Mails.pdf');
	}
}