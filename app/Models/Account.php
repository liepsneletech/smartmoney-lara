<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    const SORT = [
        'asc_name' => 'Vardas A-Z',
        'dsc_name' => 'Vardas Z-A',
        'asc_surname' => 'Pavardė A-Z',
        'dsc_surname' => 'Pavardė Z-A',
        'asc_balance' => 'Balansas 0-9',
        'dsc_balance' => 'Balansas 9-0',
    ];

    protected $fillable = ['name', 'surname', 'personal-number', 'iban', 'balance'];
}