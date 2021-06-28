<?php

namespace App\Jobs;

use App\Http\Controllers\QuizExport;
use App\Http\Controllers\QuizImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;

class GenerateQuiz implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $location_path;
    public $name;
    public $email;
    public $filename;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($location_path, $name, $email = null, $filename = '')
    {
        $this->location_path = $location_path;
        $this->name          = $name;
        $this->email         = $email;
        $this->filename      = $filename;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $quizImport = new QuizImport;
        Excel::import($quizImport, $this->location_path);
        $rows    = collect($quizImport->data_rows)->groupBy('nopek')->all();
        $headers = $quizImport->data_header;

        $AbsenExport = new QuizExport;
        $AbsenExport->export($headers, $rows, $this->name, $this->email, $this->filename);
    }
}
