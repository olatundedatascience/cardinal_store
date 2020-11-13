<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionCandidate extends Model
{
    use HasFactory;
    protected $table= "position_candidates";
    
    public $timestamps = false;
    
}
