<?php

namespace App\Support;

use App\Models\ModelInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Exceptions\FileNotFoundException;
use Storage;

trait ThrowExceptionSupport
{
    /**
     * @param ModelInterface $entity
     * @param int $id
     * @throws ModelNotFoundException
     * @return void
     */
    public static function validateModelExist(ModelInterface $entity, int $id): void
    {
        if (!$entity->find($id)) {
            throw new ModelNotFoundException(sprintf(
                'The resource \'%s\' was not found.',
                $id
            ));
        }
    }

    /**
     * @param string $fileName
     * @param string $drive
     * @throws FileNotFoundException
     * @return void
     */
    public static function validateFileExist(string $fileName, string $drive): void
    {
        if (!Storage::disk($drive)->exists($fileName)) {
            throw new FileNotFoundException(sprintf(
                'The file \'%s\' was not found.',
                $fileName
            ));
        }
    }
}