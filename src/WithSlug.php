<?php
declare(strict_types=1);

namespace JoelShepherd\CreateWith;

use Illuminate\Support\Str;

trait WithSlug
{
    /**
     * Get the slug field name.
     *
     * @return string
     */
    protected function getSlugField()
    {
        return 'slug';
    }

    /**
     * Get the text to generate the base slug from.
     *
     * @return ?string
     */
    protected function getSlugBaseText()
    {
        return null;
    }

    /**
     * Get the length of the randomly generated slug suffix.
     * This is used when no slug text is provided or if it
     * cannot find a unique value from just the text.
     *
     * @return int
     */
    protected function getSlugRandomLength()
    {
        return 7;
    }

    /**
     * Attach to the creating event
     *
     * @return void
     */
    public static function bootWithSlug()
    {
        static::creating(function ($model) {
            // Try with just the slug text
            $base = Str::slug($model->getSlugBaseText());
            $attributes = [
                $model->getSlugField() => $base
            ];

            // Otherwise add random suffix
            if (! $base || $model->existsWithAttributes($attributes)) {
                do {
                    $random = Str::lower(Str::random($model->getSlugRandomLength()));

                    $attributes = [
                        $model->getSlugField() => ($base ? "$base-": '').$random
                    ];
                } while (Support::exists(static::class, $attributes));
            }

            $model->forceFill($attributes);
        });
    }
}
