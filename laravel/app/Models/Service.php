<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    // #Fillable: یہ ان کالمز کے نام ہیں جن میں ہم ڈیٹا داخل کرنے کی اجازت دے رہے ہیں
    // اگر یہاں کالم کا نام نہیں ہوگا تو CRUD آپریشن کام نہیں کرے گا
    protected $fillable = ['name', 'description', 'price', 'image', 'skills'];}