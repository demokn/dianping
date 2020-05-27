<?php

namespace Demokn\Dianping\Poi;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['poi'] = function ($app) {
            return new Client($app);
        };
    }
}
