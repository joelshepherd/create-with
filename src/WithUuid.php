<?php
declare(strict_types=1);

namespace JoelShepherd\CreateWith;

use Ramsey\Uuid\Uuid;

trait WithUuid
{
    /**
     * Get the uuid field name
     *
     * @return string
     */
    protected function getUuidField()
    {
        return 'uuid';
    }

    /**
     * Attach to the creating event
     *
     * @return void
     */
    public static function bootWithUuid()
    {
        static::creating(function ($model) {
            do {
                $attributes = [
                    $model->getUuidField() => Uuid::uuid4()
                ];
            } while (Support::exists(static::class, $attributes));

            $model->forceFill($attributes);
        });
    }
}
