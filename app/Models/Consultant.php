<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Consultation;
use Illuminate\Database\Eloquent\Model;
use App\Models\Calendrier;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consultant extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['license_number','medical_degree_file_path','competences_attestation_file_path','competences_certificate_file_path','profile_confimed','user_id','tarif_id','speciality_id', 'enable'];
    protected $table = 'consultants';
    protected $primaryKey = "id_consultant";

    public function set_horaires($request)
    {
        foreach ($request->days as $day) {
            $start_time = $request->start_times[$day];
            $close_time = $request->close_times[$day];
            if ($request->types[$day] == "0") {
                $start_time = "00:00";
                $close_time = "23:59";
            }
            $horaire = Horaire::create([
                'start_time' => $start_time,
                'close_time' => $close_time,
            ]);
            $this->horaires()->attach([
                'schedule_id' => $horaire->id,
                'day' => $day,
            ]);
        }
    }

    public function showProfileConfirmed()
    {
        // return $this->status_request ? "Confirmé" : "En atente";
        if ($this->status_request==0){
            return "En Attente";
        }
        if($this->status_request==1){
            return "Confirmé";
        }
        if($this->status_request==-1){
            return "Refusé";
        }
    }

    public function user():BelongsTo
    {
        return $this-> belongsTo(User::class,'user_id');
    }

    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }

    public function horaires()
    {
        return $this->belongsToMany(Horaire::class)->using(Calendrier::class)->withTimestamps();
   }

}
