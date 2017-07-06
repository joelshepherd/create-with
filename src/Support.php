<?php
namespace JoelShepherd\CreateWith;

use JoelShepherd\CreateWith\Exceptions\EntropyException;

class Support
{
    /**
     * Maximum number of attempts to find a unique value.
     *
     * @var int
     */
    public static $maxAttempts = 100;

    /**
     * Regulate the number of attempts at finding a unique value.
     *
     * @param int &$attempts
     * @return void
     * @throws EntropyException
     */
    public static function attempt(int &$attempts)
    {
        if ($attempts > static::$maxAttempts) {
            throw new EntropyException('Unable to find a unique value.');
        }

        $attempts ++;
    }

    /**
     * Check if there is an existing model with these attribute already.
     *
     * @param string $model
     * @param array $attributes
     * @return bool
     */
    public static function exists($model, array $attributes): bool
    {
        return $model
            ->newQueryWithoutScopes()
            ->where($attributes)
            ->exists();
    }

    /**
     * Generate a unique identifier via a callable.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $field
     * @param callable $generate Callable to generate a value.
     * @param mixed ...$arguments Callable arguments.
     * @return array
     */
    public static function generate($model, string $field, callable $generate, ...$arguments): array
    {
        if (! empty($model->$field) &&
            ! static::exists($model, [$field => $model->$field])) {
            return [];
        }

        $attempts = 0;
        do {
            static::attempt($attempts);
            $attributes = [$field => $generate(...$arguments)];
        } while (static::exists($model, $attributes));

        return $attributes;
    }
}
