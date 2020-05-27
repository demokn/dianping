<?php

namespace Demokn\Dianping\Core\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Symfony\Component\HttpFoundation\Request;

class RequestServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['request'] = function ($app) {
            return Request::createFromGlobals();
        };
    }
}
