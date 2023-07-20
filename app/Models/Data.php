<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'data'; // Check if the table name is correct
    protected $fillable = ['name', 'description', 'type', 'file_path'];
    protected $primaryKey = 'id';
}
