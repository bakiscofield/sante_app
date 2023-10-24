<?php

namespace App\Models;

use App\Models\Calendrier;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Horaire extends Model
{
    use HasFactory;
    protected $table = 'schedules';

    protected $primaryKey = 'schedule_id';

    protected $fillable = ['start_time','end_time'];

    public function consultants()
    {
        return $this->belongsToMany(Consultant::class)->using(Calendrier::class)->withTimestamps();
    }
}
