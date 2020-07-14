<?php

namespace App\Report;

use DB;
use App\Models\Report;
use Illuminate\Support\Collection;
use Illuminate\Database\Query\Builder;
use App\Exceptions\ReportBuilderException;

class DBReportBuilder implements ReportBuilderContract
{
    /**
     * @var Builder
     */
    private $query;

    /**
     * @param Report $report
     * @return Collection
     * @throws ReportBuilderException
     */
    public function buildFromModel(Report $report)
    {
        $this->loadColumns($report->meta)
             ->loadFilters($report->filterGroup);

        return $this->get();
    }

    private function get()
    {
        return $this->query->get();
    }

    private function loadFilters(\Illuminate\Database\Eloquent\Collection $filterGroup)
    {
        if (!$this->query) throw new ReportBuilderException('No columns loaded');

        foreach ($filterGroup as $group) {
            $this->query->orWhere(function ($query) use ($group) {
                foreach ($group->filters as $filter) {
                    $query->where($filter->field->name, $filter->operator->name, $filter->value->value);
                }
            });
        }

        return $this;
    }

    private function loadColumns(\Illuminate\Database\Eloquent\Collection $meta)
    {
        $columns = $meta->pluck('name');

        $this->query = DB::table($meta->first()->model)
            ->select($columns
                ->toArray()
            );

        return $this;
    }
}
