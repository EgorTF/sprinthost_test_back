<?php

namespace App\Domain\Animals\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


/**
 * Класс-модель для сущности "Животное"
 * Class Animal
 * @package App\Domain\Animals\Models
 *
 * @property int $id - id животного
 * @property int $animal_type_id - id типа животного
 * @property string $name - имя
 * @property float $age - возраст
 * @property float $size - размер
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read AnimalType $type
 *
 */
class Animal extends Model
{
    /**
     * Заполняемые поля модели
     */
    const FILLABLE = [
        'animal_type_id',
        'name',
        'age',
        'size',
    ];

    /**
     * @var array
     */
    protected $fillable = self::FILLABLE;

    /**
     * @var string[] Преобразования типов полей.
     */
    protected $casts = [
        'animal_type_id' => 'integer',
        'name' => 'string',
        'age' => 'integer',
        'size' => 'integer',
        'status' => 'integer'
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(AnimalType::class, 'animal_type_id', 'id');
    }
}
