<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeRecord extends Model
{
    use HasFactory;

    protected $fillable = ['id_number', 'offense_type', 'offense_date', 'description', ];

    public function relatedRecords() {
        return $this->hasMany(EmployeeRecord::class, 'related_id');
    }
}
