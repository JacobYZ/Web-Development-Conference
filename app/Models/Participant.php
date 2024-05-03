<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'email', 'affiliation'];
    public function submissions()
    {
        return $this->hasOne(Submission::class);
    }
}
