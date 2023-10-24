<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unite extends Model
{
    use HasFactory;
    protected $table = 'unites';
    protected $fillable = ['libelle'];
    protected $primaryKey = 'unite_id';
}
