<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{

    const MIN_PER_SLOT = 15;

    public $relations = ['patient', 'provider'];

    protected $hidden = ['created_at', 'updated_at', 'patientId', 'providerId'];

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'providerId', 'id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patientId', 'id');
    }

    public function toArray()
    {
        $representation = parent::toArray();
        return $representation + ['isBooked' => $this->patientId !== null];
    }
}
