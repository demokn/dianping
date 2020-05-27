<?php

namespace Demokn\Dianping\OAuth;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['oauth'] = function ($app) {
            return new Client($app);
        };

        $pimple['session'] = function ($app) {
            return new SessionClient($app);
        };
    }
}
