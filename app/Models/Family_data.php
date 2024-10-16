<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\Relations\BelongsTo;

class Family_data extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id_number',
        'mate_name',
        'child_name',
        'wedding_date',
        'marriage_certificate_number',
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id_number');
    }
}
