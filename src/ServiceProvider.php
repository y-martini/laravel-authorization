<?php

namespace YuriyMartini\Laravel\Authorization;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        $this->config();
    }

    public function register()
    {
        parent::register();

        $this->mergeConfig();
    }

    private function config(): void
    {
        $this
            ->publishes(
                [__DIR__ . '/../config/defaults.php' => App::configPath('authorization/defaults.php')],
                ['config', 'authorization', 'authorization-config', 'authorization-defaults-config']
            );
        $this
            ->publishes(
                [__DIR__ . '/../config/models.php' => App::configPath('authorization/models.php')],
                ['config', 'authorization', 'authorization-config', 'authorization-models-config']
            );
    }

    private function mergeConfig(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/defaults.php', 'authorization.defaults');
        $this->mergeConfigFrom(__DIR__ . '/../config/models.php', 'authorization.models');
    }
}
