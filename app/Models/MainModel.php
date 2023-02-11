<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class MainModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="registration";
    protected $primary_key="id";
}
