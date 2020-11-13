<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shareholder extends Model
{
    use HasFactory;


    protected $table = "shareholders";

    public $timestamps = false;

    public function shares() {
        return $this->hasOne('App\Models\ShareholderShares', 'shareholder_id');
    }

    public function eligiblevoters() {
        return $this->hasMany('App\Models\EligibleVoters', 'shareholder_id');
    }
}
