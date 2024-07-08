<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsedTime extends Model
{
    use HasFactory;

    protected $fillable = ['processing_id', 'status', 'started_at', 'stopped_at', 'duration'];

    public function processing()
    {
        return $this->belongsTo(Processingadd::class);
    }
}
