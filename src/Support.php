<?php
declare(strict_types=1);

namespace JoelShepherd\CreateWith;

class Support
{
    /**
     * Check if there is an existing model with these attribute already
     *
     * @param string $model
     * @param array $attributes
     * @return bool
     */
    public static function exists($model, $attributes)
    {
        return (new $model)
            ->newQueryWithoutScopes()
            ->where($attributes)
            ->exists();
    }
}
