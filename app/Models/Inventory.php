<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Inventory extends Model
{
    use HasFactory;
    use sluggable;

    protected $fillable = ['line_no', 'slug', 'location', 'device_a_rack_type', 'device_a_rack', 'device_a_ru', 'device_a_model', 'device_a_description', 'device_a_host_name', 'device_a_port', 'detailed_cable_info', 'device_b_port', 'device_b_host_name', 'device_b_description', 'device_b_model', 'device_b_ru', 'device_b_rack', 'device_b_rack_type', 'note', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'line_no'
            ]
        ];
    }
}
