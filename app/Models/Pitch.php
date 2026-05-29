<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pitch extends Model
{
    use HasFactory;

    protected $table = 'pitches';

    protected $primaryKey = 'code';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'code',
        'name',
        'price',
        'status',
        'description',
        'pitch_type_code'
    ];

    /**
     * Relationship: One pitch belongs to one pitch type.
     */
    public function pitchType(): BelongsTo
    {
        return $this->belongsTo(PitchType::class, 'pitch_type_code', 'code');
    }
}
