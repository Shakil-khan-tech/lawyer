<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseCategory extends Model
{
    protected $table = 'case_category';
    protected $guarded = [];
    use HasFactory;
}
