<?php

namespace YuriyMartini\Laravel\Authorization\Enums;

enum Permission
{
    case create;
    case delete;
    case forceDelete;
    case restore;
    case update;
    case view;
}
