<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid as RamseyUuid;

trait Uuid
{
   /**
     * Boot function from Laravel.
     */
    protected static function bootUuid()
    {
        // parent::boot();
        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = RamseyUuid::uuid4();
            }
        });
        static::saving(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = RamseyUuid::uuid4();
            }
        });
    }

    public function getUuidColumnName(): string
    {
        return !empty($this->uuidColumnName) ? $this->uuidColumnName : 'uuid';
    }
    
    public static function findByUuid(string $uuid): ?Model
    {
        if (!RamseyUuid::isValid($uuid)) {
            return null;
        }

        return (new static)->newQuery()->where((new static)->getUuidColumnName(), '=', $uuid)->first();
    }
}