<?php

namespace App\Jobs;

use App\Http\Controllers\AbsenExport;
use App\Http\Controllers\AbsenImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel as ExcelMatt;

class GenerateReportAbsen implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $location_path;
    public $name;
    public $email;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($location_path, $name, $email = null)
    {
        $this->location_path = $location_path;
        $this->name          = $name;
        $this->email         = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $absenImport = new AbsenImport;
        ExcelMatt::import($absenImport, $this->location_path);

        $AbsenExport = new AbsenExport;
        $AbsenExport->export($absenImport->data_rows, $this->name, $this->email);
    }
}
