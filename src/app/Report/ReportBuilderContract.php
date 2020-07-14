<?php

namespace App\Report;

use App\Models\Report;

interface ReportBuilderContract
{
    public function buildFromModel(Report $report);
}
