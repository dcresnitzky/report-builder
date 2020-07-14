<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportFilter extends Model
{
    protected $table = 'report_filter';

    protected $with = ['field', 'operator', 'value'];

    public function filterGroup()
    {
        return $this->belongsTo(ReportFilterGroup::class);
    }

    public function field()
    {
        return $this->belongsTo(Meta::class, 'meta_id');
    }

    public function operator()
    {
        return $this->belongsTo(Operator::class);
    }

    public function value()
    {
        return $this->belongsTo(Value::class);
    }
}
