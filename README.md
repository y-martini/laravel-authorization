[![Latest Version](http://img.shields.io/packagist/v/yuriy-martini/laravel-authorization.svg?label=Release&style=for-the-badge)](https://packagist.org/packages/yuriy-martini/laravel-authorization)
[![MIT License](https://img.shields.io/github/license/yuriy-martini/laravel-authorization.svg?label=License&color=blue&style=for-the-badge)](https://github.com/yuriy-martini/laravel-authorization/blob/master/LICENSE.md)

# Laravel Authorization

https://laravel.com/docs/master/authorization#introduction

## Installation

```shell
composer require yuriy-martini/laravel-authorization
```

## Usage

https://laravel.com/docs/master/authorization#authorizing-actions-using-policies

1. [Authorizable](#u-authorizable) (User)
2. [Config](#u-config)
3. [Policies](#u-policies)

### U/ Authorizable

#### U/ A/ Example

`-+ app/Models/User.php`:

```php
<?php

namespace App\Models;

class User
    implements \YuriyMartini\Laravel\Authorization\Contracts\Authorizable
{
    use \YuriyMartini\Laravel\Authorization\Concerns\Authorizable;
}
```

### U/ Config

#### U/ C/ Defaults

```shell
php artisan vendor:publish --tag=authorization-defaults-config
```

#### U/ C/ Models

```shell
php artisan vendor:publish --tag=authorization-models-config
```

#### U/ C/ M/ Example

`+ config/authorization/models.php`:

```php
<?php

return [
    \App\Models\User::class => [
        \App\Models\User::class => [
            YuriyMartini\Laravel\Authorization\Enums\Permission::view,
        ],
    ],
];
```

### U/ Policies

https://laravel.com/docs/master/authorization#generating-policies

#### U/ P/ Example

`app/Policies/UserPolicy.php`:

```php
<?php
 
namespace App\Policies;
 
class UserPolicy 
    extends \YuriyMartini\Laravel\Authorization\Policy
{
    protected static function getModel(): string
    {
        return \App\Models\User::class;
    }
}
```

## Changelog

Please see [Changelog File](CHANGELOG.md) for more information on what has changed recently.

## Testing

```shell
composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
