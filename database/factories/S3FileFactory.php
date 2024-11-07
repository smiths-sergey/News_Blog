<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Symfony\Component\Mime\MimeTypes;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\S3File>
 */
class S3FileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $mimeTypes = new MimeTypes();
        $fileExtension = $this->faker->fileExtension();
        $mimeType = $mimeTypes->getMimeTypes($fileExtension);
        return [
            'sha256' => hash('sha256', $this->faker->unique()->sentence()),
            'file_name' => $this->faker->word() . '.' . $fileExtension,
            'mime_type' => Arr::wrap($mimeType)[0],

        ];
    }
}
