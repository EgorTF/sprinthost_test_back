<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /** @var string[][] */
    protected const TYPES = [
        [
            'type' => 'Собака',
            'image' => 'dog.png',
            'max_size' => '30',
            'max_age' => '30',
            'growing_factor' => '1.2',
        ],
        [
            'type' => 'Кошка',
            'image' => 'cat.png',
            'max_size' => '30',
            'max_age' => '30',
            'growing_factor' => '1.2',
        ],
        [
            'type' => 'Голубь',
            'image' => 'bird.png',
            'max_size' => '30',
            'max_age' => '30',
            'growing_factor' => '1.2',
        ],
        [
            'type' => 'Медведь',
            'image' => 'bear.png',
            'max_size' => '30',
            'max_age' => '30',
            'growing_factor' => '1.2',
        ]
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('animal_types', function (Blueprint $table) {
            $table->id();
            $table->string('type')->unique();
            $table->text('image');
            $table->decimal('max_size', '8', '2');
            $table->decimal('max_age', '8', '2');
            $table->decimal('growing_factor', '8', '2');
        });

        DB::table('animal_types')->insert(self::TYPES);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('animal_types');
    }
};
