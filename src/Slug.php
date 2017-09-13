<?php
namespace JoelShepherd\CreateWith;

use Illuminate\Support\Str;

/**
 * Adds an unique slug to the model.
 */
trait Slug
{
    /**
     * Generate a candidate slug that will be tested for uniqueness.
     *
     * @param string $base The slug transform of the base text.
     * @return string
     */
    public function generateCandidateSlug(string $base): string
    {
        $random = $this->convertTextToSlug(
            Str::random($this->getSlugRandomLength())
        );

        return trim("$base-$random", '-');
    }

    /**
     * Method used to convert text into a slug.
     *
     * @param string $text
     * @return string
     */
    public function convertTextToSlug(string $text): string
    {
        return Str::slug($text);
    }

    /**
    * Bind generation logic to the creating event.
     *
     * @return void
     */
    public static function bootSlug()
    {
        static::creating(function ($model) {
            $base = $model->getSlugBaseText()
                ? $this->convertTextToSlug($model->getSlugBaseText())
                : '';

            $model->forceFill([
                $model->getSlugField() => $base
            ]);

            $attributes = Support::generate(
                $model, $model->getSlugField(),
                [$model, 'generateCandidateSlug'], $base
            );

            $model->forceFill($attributes);
        });
    }

    /**
     * Get the base text to generate the slug from.
     *
     * @return ?string
     */
    protected function getSlugBaseText()
    {
        return null;
    }

    /**
     * Get the slug field name.
     *
     * @return string
     */
    protected function getSlugField(): string
    {
        return 'slug';
    }

    /**
     * Get the length of the randomly generated slug suffix.
     * This is used when no slug text is provided or if it
     * cannot find a unique value from just the text.
     *
     * @return int
     */
    protected function getSlugRandomLength(): int
    {
        return 7;
    }
}
