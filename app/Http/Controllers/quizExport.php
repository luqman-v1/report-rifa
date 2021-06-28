<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Facades\Excel;
use Mail;

class QuizExport extends Controller implements FromView
{
    const MAX_HOUR = 1705;
    public $data_rows;
    public $data_headers;

    public function __construct($data_headers = null, $data_rows = null)
    {
        $this->data_rows    = collect($data_rows);
        $this->data_headers = collect($data_headers);
    }

    public function view(): View
    {
        $rows    = $this->data_rows;
        $headers = $this->data_headers;
        return view('excel.quiz', compact('rows', 'headers'));
    }

    public function export($data_header, $data_rows, $name, $email, $filename)
    {
        $attach = Excel::download(new QuizExport($data_header, $data_rows), 'quiz.xlsx')->getFile();
        $info   = ['name' => $name, 'email' => $email];

        Mail::send('mails.report', [], function ($message) use ($attach, $info, $filename) {
            $message->to($info['email'], $info['name'])
                ->subject("email")
                ->attach(
                    $attach, ['as' => $filename]
                );
        });
    }

}
