<?php

namespace Webfucktory\Laravel\Authorization\Enums;

enum Permission
{
    case create;
    case delete;
    case forceDelete;
    case restore;
    case update;
    case view;
}
