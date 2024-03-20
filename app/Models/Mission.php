<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;
    protected $table = 'mission';
    protected $fillable = ['candidate_id', 'mission'];
    public function candidate()
    {
        return $this->hasOne(Candidate::class, 'id', 'candidate_id');
    }
}
