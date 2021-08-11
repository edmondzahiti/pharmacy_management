<?php

namespace App\Models;

use Database\Factories\PharmacyFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pharmacy extends Model
{
    use HasFactory;

    protected $table = 'pharmacies';

    protected $fillable = [
        'name',
        'email',
        'vat_number',
        'phone',
        'active',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return PharmacyFactory::new();
    }
}
