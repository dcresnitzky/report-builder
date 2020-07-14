<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Report\ReportBuilderContract;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ReportController extends Controller
{
    public function show($reportId, ReportBuilderContract $reportBuilder)
    {
        try {
            $report = Report::findOrFail($reportId);

            $data = $reportBuilder->buildFromModel($report);

            return response($data);

        } catch (ModelNotFoundException $modelNotFoundException) {

            abort(404);
        } catch (\Exception $e) {

            report($e);

            abort(500);
        }
    }
}
