<?php namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Report extends Controller
{
    public function store(Request $request){
        Session::put($request->tanggal,json_encode($request->all()));
        return back();
    }

    public function getReport(){
        $report_all = Session::all();
        unset($report_all['_token']);
        unset($report_all['_previous']);
        unset($report_all['_flash']);
        $pages = [];
        // setlocale(LC_TIME, 'id_ID');
        Carbon::setLocale('id');
        foreach ($report_all as $key => $v) {
            $data = json_decode($v);
            $pages[] =  view('report.report', compact('data'));
        }
        $pdf = PDF::loadView('report.multiple',compact('pages'));   
        return $pdf->stream();         
    //    return view('report.report',compact('data'));
    }

    public function getForm()
    {
        return view('report.form');
    }
}
