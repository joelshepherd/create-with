<?php
namespace JoelShepherd\CreateWith;

/**
 * Adds IP Address (v4) to the model.
 */
trait WithIpAddress
{
    /**
     * Get the IP Address
     *
     * @return string
     */
    public function getIpAddress(): string
    {
        return getenv('HTTP_CLIENT_IP') ?: getenv('HTTP_X_FORWARDED_FOR')
	        ?: getenv('HTTP_X_FORWARDED') ?: getenv('HTTP_FORWARDED_FOR')
	        ?: getenv('HTTP_FORWARDED') ?: getenv('REMOTE_ADDR')
			?: gethostbyname(gethostname());
    }

    /**
     * Bind logic to the creating event.
     *
     * @return void
     */
    public static function bootWithIpAddress()
    {
        static::creating(function ($model) {
            $model->forceFill([$model->getIpAddressField() => $model->getIpAddress()]);
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
