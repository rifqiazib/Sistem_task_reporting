<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class ReportTask extends Model
{
    protected $table = "report_task";
    protected $fillable = ['task_desc', 'created_date', 'created_by'];

    public function hasCreator() {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
}
