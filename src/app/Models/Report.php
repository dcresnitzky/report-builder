<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'report';

    protected $with = [ 'meta', 'filterGroup.filters' ];

    public function meta()
    {
        return $this->belongsToMany(Meta::class, 'report_meta');
    }

    public function filterGroup()
    {
        return $this->hasMany(ReportFilterGroup::class);
    }
}
