<?php

namespace YuriyMartini\Laravel\Authorization\Concerns;

use Illuminate\Support\Facades\Config;
use YuriyMartini\Laravel\Authorization\Enums\Permission;

trait Authorizable
{
    public function authorizedToCreate(string $model): bool
    {
        return $this->authorizedTo(Permission::create, $model);
    }

    public function authorizedToDelete(string $model): bool
    {
        return $this->authorizedTo(Permission::delete, $model);
    }

    public function authorizedToForceDelete(string $model): bool
    {
        return $this->authorizedTo(Permission::forceDelete, $model);
    }

    public function authorizedToRestore(string $model): bool
    {
        return $this->authorizedTo(Permission::restore, $model);
    }

    public function authorizedToUpdate(string $model): bool
    {
        return $this->authorizedTo(Permission::update, $model);
    }

    public function authorizedToView(string $model): bool
    {
        return $this->authorizedTo(Permission::view, $model);
    }

    protected function authorizedTo(Permission $permission, string $model): bool
    {
        $authorizable = $this::class;

        $permissions = Config::get("authorization.models.$authorizable.$model");

        return $permissions !== null ? in_array($permission, $permissions) : static::defaultAuthorizable($permission);
    }

    private static function defaultAuthorizable(Permission $permission): bool
    {
        $default = Config::get('authorization.defaults.authorizable');
        return $default === '*' || in_array($permission, $default);
    }
}
