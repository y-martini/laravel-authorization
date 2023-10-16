<?php

namespace YuriyMartini\Laravel\Authorization\Concerns;

use Illuminate\Support\Facades\Config;
use YuriyMartini\Laravel\Authorization\Contracts\Model;
use YuriyMartini\Laravel\Authorization\Contracts\Authorizable;
use YuriyMartini\Laravel\Authorization\Enums\Permission;

trait ModelAuthorization
{
    protected static function modelIsDeletable(object $model, Authorizable $user): bool
    {
        return $model instanceof Model
            ? $model->isDeletable($user)
            : static::defaultModelAuthorization(Permission::delete);
    }

    protected static function modelIsForceDeletable(object $model, Authorizable $user): bool
    {
        return $model instanceof Model
            ? $model->isForceDeletable($user)
            : static::defaultModelAuthorization(Permission::forceDelete);
    }

    protected static function modelIsRestorable(object $model, Authorizable $user): bool
    {
        return $model instanceof Model
            ? $model->isRestorable($user)
            : static::defaultModelAuthorization(Permission::restore);
    }

    protected static function modelIsUpdatable(object $model, Authorizable $user): bool
    {
        return $model instanceof Model
            ? $model->isUpdatable($user)
            : static::defaultModelAuthorization(Permission::update);
    }

    protected static function modelIsViewable(object $model, Authorizable $user): bool
    {
        return $model instanceof Model
            ? $model->isViewable($user)
            : static::defaultModelAuthorization(Permission::view);
    }

    private static function defaultModelAuthorization(Permission $permission): bool
    {
        $default = Config::get('authorization.defaults.model');
        return $default === '*' || in_array($permission, $default);
    }
}
