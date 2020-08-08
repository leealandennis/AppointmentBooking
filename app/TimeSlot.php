<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{

    const MIN_PER_SLOT = 15;

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'id', 'providerId');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'id', 'patientId');
    }
}
