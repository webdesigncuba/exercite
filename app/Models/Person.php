<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Person extends Model
{
    use HasFactory;

    protected $table = 'person';

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

}
