<?php

namespace App\Http\Controllers;

use App\Jobs\sendPdf;
use App\Models\Report as ReportModel;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Report extends Controller
{
    public function store(Request $request)
    {
        $report = ReportModel::firstOrCreate(['tanggal' => $request->tanggal]);
        $data   = [
            "tanggal"        => $request->tanggal,
            "lama_pelaksana" => $request->lama_pelaksana,
            "kegiatan"       => $request->kegiatan,
            "kuantitas"      => $request->kuantitas,
            "hasil"          => $request->hasil,
            "keterangan"     => $request->keterangan,
        ];
        $report->payload = json_encode($data);
        $report->save();
        return back();
    }

    public function getReportGenerate(Request $request)
    {
        $report_all = ReportModel::get();
        // if (count($report_all) >= 10) {
        sendPdf::dispatch($request->name, $request->email);
        return back();
        // }
        $pages = [];
        // setlocale(LC_TIME, 'id_ID');
        Carbon::setLocale('id');
        foreach ($report_all as $key => $v) {
            $data    = json_decode($v->payload);
            $pages[] = view('report.report', compact('data'));
        }
        $pdf = PDF::loadView('report.multiple', compact('pages'));
        return $pdf->stream();
        //    return view('report.report',compact('data'));
    }

    public function getForm()
    {
        return view('report.form');
    }

    public function getReportList()
    {
        $report_all = ReportModel::get();
        return view('report.list', compact('report_all'));
    }

    public function getReportDelete($tanggal = "")
    {
        ReportModel::where('tanggal', $tanggal)->delete();
        return back();
    }

    public function getReport(Request $request)
    {
        // $report_all = ReportModel::limit(5)->get();

        // $pages = [];
        // Carbon::setLocale('id');
        // foreach ($report_all as $key => $v) {
        //     $data    = json_decode($v->payload);
        //     $pages[] = view('report.report', compact('data'));
        // }
        // $pdf = PDF::loadView('report.multiple', compact('pages'));
        // return $pdf->stream();
        return view('report.generate');
    }
}
