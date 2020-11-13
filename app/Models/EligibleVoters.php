<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EligibleVoters extends Model
{
    use HasFactory;

    protected $table = 'eligible_voters';

    public function Shareholder() {
        //return $this->belongsTo('App\Models\EligibleVoters');
    }
}
