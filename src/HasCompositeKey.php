<?php

namespace Mpociot\HasCompositeKey;

use Exception;
use Illuminate\Database\Eloquent\Builder;

/**
 * Use this trait if your model has a composite primary key.
 * The primary key should then be an array with all applicable columns.
 *
 * Class HasCompositeKey
 * @package App\Traits
 */
trait HasCompositeKey
{
    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Set the keys for a save update query.
     *
     * @param  Builder $query
     * @return Builder
     * @throws Exception
     */
    protected function setKeysForSaveQuery(Builder $query)
    {
        foreach ($this->getKeyName() as $key) {
            if ($this->$key)
                $query->where($key, '=', $this->$key);
            else
                throw new Exception(__METHOD__ . 'Missing part of the primary key: ' . $key);
        }

        return $query;
    }
}