<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Facades\Excel;
use Mail;

class AbsenExport extends Controller implements FromView
{
    const MAX_HOUR = 1705;
    public $data_collection;

    public function __construct($data_collection = null)
    {
        $this->data_collection = collect($data_collection);
    }

    public function view(): View
    {
        $this->removeDuplicate();
        $datas = $this->removeLate();
        return view('excel.absen', compact('datas'));
    }

    public function export($data, $name, $email)
    {
        $attach = Excel::download(new AbsenExport($data), 'absen.xlsx')->getFile();
        $info   = ['name' => $name, 'email' => $email];

        Mail::send('mails.report', [], function ($message) use ($attach, $info) {
            $message->to($info['email'], $info['name'])
                ->subject("email")
                ->attach(
                    $attach, ['as' => 'report.xlsx']
                );
        });
    }

    public function removeDuplicate()
    {
        return $this->data_collection->unique('nopek');
    }

    public function removeLate()
    {
        return $this->data_collection->filter(function ($value, $key) {
            return Carbon::parse($value['date'])->format('Hi') <=  self::MAX_HOUR;
        });
    }
}
