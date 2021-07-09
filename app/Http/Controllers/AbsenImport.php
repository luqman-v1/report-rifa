<?php

namespace App\Http\Controllers;

use App\Jobs\GenerateReportAbsen;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\ToCollection;

class AbsenImport extends Controller implements ToCollection
{
    public $data_rows;

    public function index()
    {
        return view('excel.form');
    }

    public function store(Request $request)
    {
        $file_path = "";
        if ($request->has('file')) {
            $file_path = $this->upload($request->file);
        }
        GenerateReportAbsen::dispatch($file_path, $request->name, $request->email);
        return back();
    }

    public function upload($file): string
    {
        $filename = rand(1111111, 9999999) . '.' . $file->getClientOriginalExtension();
        Storage::disk('public')->put($filename, file_get_contents($file->getRealPath()));
        return storage_path('app/public/') . $filename;
    }

    public function collection($rows)
    {
        foreach ($rows as $key => $row) {
            if ($key > 0) {
                if (isset($row[6]) && $row[6] != "") {
                    $this->data_rows[] = $this->mapping($row);
                }
            }
        }
    }

    public function toDateTime(string $value)
    {
        return Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value))->format('Y-m-d H:i:s');
    }

    public function mapping($object): array
    {
        $nopek       = isset($object[6]) ? $object[6] : "";
        $tgl_webinar = isset($object[7]) ? $object[9] : "";
        return [
            'nopek'             => $nopek,
            'nama'              => isset($object[5]) ? $object[5] : "",
            'fungsi'            => isset($object[8]) ? $object[8] : "",
            'direktorat'        => isset($object[7]) ? $object[7] : "",
            'date'              => isset($object[1]) ? $this->toDateTime($object[1]) : "",
            'tgl_webinar'       => $tgl_webinar,
            'bulantgl_webinar'  => isset($object[7]) ? $object[10] : "",
            'judul'             => '',
            'nopek_tgl_webinar' => $nopek . '_' . $tgl_webinar,
        ];
    }
}
