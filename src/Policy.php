<?php

namespace YuriyMartini\Laravel\Authorization;

use YuriyMartini\Laravel\Authorization\Concerns\ModelAuthorization;
use YuriyMartini\Laravel\Authorization\Contracts\Authorizable;

abstract class Policy
{
    use ModelAuthorization;

    /**
     * @return class-string
     */
    abstract protected static function getModel(): string;

    public function viewAny(Authorizable $user): bool
    {
        return $user->authorizedToView(static::getModel());
    }

    public function create(Authorizable $user): bool
    {
        return $user->authorizedToCreate(static::getModel());
    }

    public function view(Authorizable $user, object $model): bool
    {
        return $user->authorizedToView(static::getModel()) && static::modelIsViewable($model, $user);
    }

    public function update(Authorizable $user, object $model): bool
    {
        return $user->authorizedToUpdate(static::getModel()) && static::modelIsUpdatable($model, $user);
    }

    public function delete(Authorizable $user, object $model): bool
    {
        return $user->authorizedToDelete(static::getModel()) && static::modelIsDeletable($model, $user);
    }

    public function restore(Authorizable $user, object $model): bool
    {
        return $user->authorizedToRestore(static::getModel()) && static::modelIsRestorable($model, $user);
    }

    public function forceDelete(Authorizable $user, object $model): bool
    {
        return $user->authorizedToForceDelete(static::getModel()) && static::modelIsForceDeletable($model, $user);
    }
}
