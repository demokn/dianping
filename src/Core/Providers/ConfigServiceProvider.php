<?php

namespace Demokn\Dianping\Core\Providers;

use Demokn\Dianping\Core\Configure;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ConfigServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['config'] = function ($app) {
            return new Configure($app->getConfig());
        };
    }
}
