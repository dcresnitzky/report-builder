<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportFilterGroup extends Model
{
    protected $table = 'report_filter_group';

    public function filters()
    {
        return $this->hasMany(ReportFilter::class);
    }
}
