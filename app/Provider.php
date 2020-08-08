<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    public function timeSlots()
    {
        return $this->hasMany(TimeSlot::class, 'providerId', 'id');
    }

    public function availabilities()
    {
        return $this->timeSlots()->whereNull('patientId');
    }
}
