<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class locations extends Model
{
    use HasFactory;
    protected $table ="locations";
    protected $primaryKey="idlocations";
    public $timestamps = false;
}
