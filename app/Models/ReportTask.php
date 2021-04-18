<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Carbon;

class ReportTask extends Model
{
    protected $table = "report_task";
    protected $fillable = ['task_desc', 'created_date', 'created_by'];
    protected $dates = ['created_date'];

    public function hasCreator(){

        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function getCreatedDate()
    {
        return Carbon::parse($this->attributes['created_date'])->translatedFormat('l, d F Y');
    }
}
