<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\Report;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Barryvdh\DomPDF\Facade as PDF;
class sendPdf implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $name;
    public $email;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($name = "",$email = "")
    {
        $this->name = $name;
        $this->email = $email;
        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $report_all = Report::get();
        $pages = [];
        // setlocale(LC_TIME, 'id_ID');
        Carbon::setLocale('id');
        foreach ($report_all as $key => $v) {
            $data = json_decode($v->payload);
            $pages[] =  view('report.report', compact('data'));
        }
        $pdf = PDF::loadView('report.multiple', compact('pages'));
         $info = ['name' =>$this->name, 'email' =>$this->email];
        Mail::send('mails.report', [], function ($message) use ($pdf, $info) {
            $message->to($info['email'], $info['name'])
            ->subject("email")
            ->attachData($pdf->output(), "report.pdf");
        }); 
    }
    
}
