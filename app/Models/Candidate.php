<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    public const CATEGORY_BEM = 'BEM';
    public const CATEGORY_BLM = 'BLM';

    use HasFactory;
    protected $fillable = [
        'npm','name','photo','vote_count','category_id'
    ];
   
  
    public function vision()
    {
        return $this->hasMany(Vision::class, 'candidate_id', 'id');
    }
    public function mission()
    {
        return $this->hasMany(Mission::class, 'candidate_id', 'id');
    }
    public static function getCategory()
    {
        return [
            self::CATEGORY_BEM,
            self::  CATEGORY_BLM,
        ];
    }
    
    public function votersBem()
    {
        return $this->hasMany(User::class, 'candidate_bem_id', 'id');
    }
}
