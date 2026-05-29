<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PitchType extends Model
{
    use HasFactory;

    protected $table = 'pitch_types';

    protected $primaryKey = 'code';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'code',
        'name',
        'description'
    ];

    /**
     * Relationship: One pitch type has many pitches.
     */
    public function pitches(): HasMany
    {
        return $this->hasMany(Pitch::class, 'pitch_type_code', 'code');
    }
}
