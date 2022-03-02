<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralInformation extends Model
{
    use HasFactory;

    protected $fillable = ['company_name', 'company_address', 'company_phone',
        'company_phone1', 'company_logo', 'company_slogan', 'company_email', 'company_desc'];
}
