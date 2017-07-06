<?php
namespace JoelShepherd\CreateWith;

use Ramsey\Uuid\Uuid;

trait WithUuid
{
    /**
     * Generate a candidate UUID that will be tested for uniqueness.
     *
     * @return string
     */
    public function generateCandidateUuid(): string
    {
        return Uuid::uuid4();
    }

    /**
     * Bind generation logic to the creating event.
     *
     * @return void
     */
    public static function bootWithUuid()
    {
        static::creating(function ($model) {
            $attributes = Support::generate(
                $model, $model->getUuidField(), [$model, 'generateCandidateUuid']
            );

            $model->forceFill($attributes);
        });
    }

    /**
     * Get the uuid field name.
     *
     * @return string
     */
    protected function getUuidField(): string
    {
        return 'uuid';
    }
}
