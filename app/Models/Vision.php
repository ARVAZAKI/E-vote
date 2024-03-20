<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vision extends Model
{
    use HasFactory;
   protected $table = 'vision';
    protected $fillable = ['candidate_id','vision'];
    public function candidate()
    {
        return $this->hasOne(Candidate::class, 'id', 'candidate_id');
    }
}
