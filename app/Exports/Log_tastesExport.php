<?php

namespace App\Exports;

use App\Invoice;
use Maatwebsite\Excel\Concerns\FromArray;

class Log_tastesExport implements FromArray
{
    protected $log_tastes;

    public function __construct(array $log_tastes)
    {
        $this->log_tastes = $log_tastes;
    }

    public function array(): array
    {
        return $this->log_tastes;
    }
}
