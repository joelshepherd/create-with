<?php
namespace JoelShepherd\CreateWith;

use Illuminate\Database\Eloquent\Model;
use JoelShepherd\CreateWith\Slug;

/**
 * Base model that uses a slug as the primary identifier.
 */
class SlugModel extends Model
{
    use Slug;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Get the slug field name.
     *
     * @return string
     */
    protected function getSlugField(): string
    {
        return $this->getKeyName();
    }
}
