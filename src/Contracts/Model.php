<?php

namespace YuriyMartini\Laravel\Authorization\Contracts;

interface Model
{
    public function isViewable(Authorizable $user): bool;

    public function isUpdatable(Authorizable $user): bool;

    public function isDeletable(Authorizable $user): bool;

    public function isRestorable(Authorizable $user): bool;

    public function isForceDeletable(Authorizable $user): bool;
}
