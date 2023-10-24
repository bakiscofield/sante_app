<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;
use App\Models\Consultant;
use App\Models\Presentiel;
use App\Models\Enligne;

class Consultation extends Model
{
    use HasFactory;

    protected $table = 'consultations';
    protected $primaryKey = 'consultation_id';
    protected $fillable = [
        'consultant_id',
        'patient_id',
        'wanted_date',
        'wanted_duration',
        'state',
        'cancel_by_patient',
        'do',
        'type',
        'link',
        'country',
        'town',
        'address',
        'location',
    ];

    public function patient():BelongsTo{
        return $this->belongsTo(Patient::class, 'patient_id', 'id_patient');
    }

    public function consultant():BelongsTo{
        return $this->belongsTo(Consultant::class, 'consultant_id', 'id_consultant');
    }
}
