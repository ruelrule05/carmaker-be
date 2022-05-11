<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['car_type_id', 'color_id', 'manufacturer_id', 'name'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function carType()
    {
        return $this->belongsTo(CarType::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }
}
