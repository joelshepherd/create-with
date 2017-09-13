<?php
namespace JoelShepherd\CreateWith;

use Illuminate\Database\Eloquent\Model;
use JoelShepherd\CreateWith\Uuid;

/**
* Base model that uses a uuid as the primary identifier.
 */
class UuidModel extends Model
{
    use Uuid;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Get the uuid field name.
     *
     * @return string
     */
    protected function getUuidField(): string
    {
        return $this->getKeyName();
    }
}
