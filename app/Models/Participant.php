<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'affiliate'];
    public function submissions()
    {
        return $this->hasOne(Submission::class, 'author_id');
    }
}
