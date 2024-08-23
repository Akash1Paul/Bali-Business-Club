<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailContent extends Model
{
    use HasFactory;

    
    protected $table = 'content_of_emails';

    protected $fillable = [
        'subject',
        'body',
        'partner_email_body',
        'email_name'
    ];
}
