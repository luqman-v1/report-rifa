<?php namespace App\Http\Controllers;

use App\Jobs\GenerateQuiz;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\ToCollection;

class QuizImport extends Controller implements ToCollection
{
    public $data_header = [];
    public $data_rows;
    public $file_name = '';

    public function index()
    {
        return view('excel.formquiz');
    }

    public function store(Request $request)
    {
        $file_path = "";
        if ($request->has('file')) {
            $file_path = $this->upload($request->file);
        }
        GenerateQuiz::dispatch($file_path, $request->name, $request->email, $this->file_name);
        return back();
    }

    public function upload($file): string
    {
        $filename        = $filename        = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '-cleansed' . '.' . $file->getClientOriginalExtension();
        $this->file_name = $filename;
        Storage::disk('public')->put($filename, file_get_contents($file->getRealPath()));
        return storage_path('app/public/') . $filename;
    }
    public function isDate($value)
    {
        if (!$value) {
            return false;
        }

        try {
            new \DateTime($value);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function collection($rows)
    {
        foreach ($rows as $key => $row) {
            if ($key == 0) {
                foreach ($row as $r) {
                    $this->data_header[] = strtolower(str_replace(' ', '_', $r));
                }
            }
            if ($key > 0) {
                if (isset($row[6]) && $row[6] != "") {
                    $this->data_rows[] = $this->mapping($row);
                }
            }
        }
    }

    public function mapping($data)
    {
        $remove   = [' ', '"    '];
        $new_data = [];
        foreach ($this->data_header as $k => $v) {
            $data_map = $data[$k];
            $key_name = str_replace($remove, "", trim($v));
            if ($key_name == 'waktu_mulai') {
                $new_data['tanggal_webbinar'] = $this->toDateTime($data[$k], "Y-m-d");
            }
            $new_data[$key_name] = $data_map;
        }
        return $data_rows[] = $new_data;
    }
    public function toDateTime(string $value, string $format = "")
    {
        $date = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        if ($format == "") {
            $format = 'Y-m-d H:i:s';
        }
        return $date->format($format);
    }

}
