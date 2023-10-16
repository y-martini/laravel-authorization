<?php

namespace YuriyMartini\Laravel\Authorization\Contracts;

interface Authorizable
{
    public function authorizedToCreate(string $model): bool;

    public function authorizedToDelete(string $model): bool;

    public function authorizedToForceDelete(string $model): bool;

    public function authorizedToRestore(string $model): bool;

    public function authorizedToUpdate(string $model): bool;

    public function authorizedToView(string $model): bool;
}
