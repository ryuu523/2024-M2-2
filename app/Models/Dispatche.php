<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispatche extends Model
{
    use HasFactory;
    protected $primaryKey="dispatche_id";
    protected $fillable=["event_id","worker_id","is_approval","memo"];

}
