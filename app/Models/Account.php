<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account extends Model
{
    use Searchable;
    use HasFactory;

    protected $fillable = ['name', 'surname', 'personal-number', 'iban', 'balance'];

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'surname' => $this->surname,
            'iban' => $this->iban
        ];
    }

    const SORT = [
        'asc_surname' => 'Pavardė A-Z',
        'dsc_surname' => 'Pavardė Z-A',
        'asc_name' => 'Vardas A-Z',
        'dsc_name' => 'Vardas Z-A',
        'asc_balance' => 'Balansas 0-9',
        'dsc_balance' => 'Balansas 9-0',
    ];

    const FILTER = [
        'balanceMoreZero' => 'Su lėšomis',
        'balanceZero' => 'Be lėšų',
    ];
}