<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ReportTask extends Model
{
    protected $table = "report_task";
    protected $fillable = ['task_desc', 'created_date'];
}
