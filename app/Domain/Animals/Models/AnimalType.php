<?php

namespace App\Domain\Animals\Models;


use Illuminate\Database\Eloquent\Model;
/**
 * Класс-модель для сущности "Животное"
 * Class Animal
 * @package App\Domain\Animals\Models
 *
 * @property integer $id
 * @property string $type - тип животного
 * @property string $image - название файла изображения
 * @property float $max_age - максимальный возраст
 * @property float $max_size - максимальный размер
 * @property float $growing_factor - фактор роста
 */
class AnimalType extends Model
{
    public function getImagePath(): string
    {
        return '/images/' . $this->image;
    }
}
