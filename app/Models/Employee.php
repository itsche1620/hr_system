<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id_number',
        'full_name',
        'nickname',
        'contract_date',
        'work_date',
        'status',
        'position',
        'nuptk',
        'gender',
        'place_birth',
        'birth_date',
        'religion',
        'email',
        'hobby',
        'marital_status',
        'residence_address',
        'phone',
        'address_emergency',
        'phone_emergency',
        'blood_type',
        'last_education',
        'agency',
        'graduation_year',
        'competency_training_place',
        'organizational_experience'
    ];
    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id_number';
    public $incrementing = false;
    protected $keyType = 'bigInteger';
    function employee_records()
    {
        return $this->hasMany(EmployeeRecord::class);
    }
    function Family_data()
    {
        return $this->hasOne(Family_data::class);
    }
}


