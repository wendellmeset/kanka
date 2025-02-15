<?php

namespace App\Models;

use App\Models\Concerns\Blameable;
use App\Traits\VisibilityIDTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class EntityAbility
 * @package App\Models
 *
 * @property int $id
 * @property integer $entity_id
 * @property integer $ability_id
 * @property integer $charges
 * @property integer $position
 * @property string $note
 * @property integer $created_by
 * @property integer $updated_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Ability|null $ability
 * @property Entity|null $entity
 *
 * @method static Builder|self defaultOrder()
 */
class EntityAbility extends Model
{
    use Blameable;
    use HasFactory;
    use VisibilityIDTrait;

    /**
     * Fillable fields
     */
    public $fillable = [
        'entity_id',
        'ability_id',
        'visibility_id',
        'created_by',
        'charges',
        'position',
        'note',
    ];

    /**
     */
    public function entity(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Entity');
    }

    /**
     */
    public function ability(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Ability');
    }

    /**
     * Who created this entry
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    /**
     * @return Builder
     */
    public function scopeDefaultOrder(Builder $query)
    {
        return $query
            ->orderBy('position')
            ->orderBy('a.type')
            ->orderBy('a.name')
        ;
    }

    /**
     * Copy an entity ability to another target
     */
    public function copyTo(Entity $target)
    {
        $new = $this->replicate(['entity_id']);
        $new->entity_id = $target->id;
        return $new->save();
    }
}
