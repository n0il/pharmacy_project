<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PdfPerscriptions extends Model
{
    use HasFactory;

    protected $table = 'pdfs';

    protected $fillable = ['path', 'title'];
}
