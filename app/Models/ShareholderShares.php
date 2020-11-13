<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShareholderShares extends Model
{
    use HasFactory;

    protected $table= "shareholder_shares";

    public $timestamps = false;
}
