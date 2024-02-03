<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'person_id',
        'tax_number',
        'full_name',
        'other_id',
        'entry_date',
        'leave_date',
        'email_address',
        'insert_status',
    ];    
}
