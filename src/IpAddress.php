<?php
namespace JoelShepherd\CreateWith;

use Illuminate\Http\Request;

/**
 * Adds IP Address (v4) to the model.
 */
trait IpAddress
{
    /**
     * Get the IP Address
     *
     * @return string
     */
    public function getIpAddress(): string
    {
        // Check for an existing request object
        $request = function_exists('app')
            ? app(Request::class)
            : Request::capture();

        return $request->ip() ?: gethostbyname(gethostname());
    }

    /**
     * Bind logic to the creating event.
     *
     * @return void
     */
    public static function bootIpAddress()
    {
        static::creating(function ($model) {
            $model->forceFill([
                $model->getIpAddressField() => $model->getIpAddress()
            ]);
        });
    }

    /**
     * Get the ip_address field name.
     *
     * @return string
     */
    protected function getIpAddressField(): string
    {
        return 'ip_address';
    }
}
