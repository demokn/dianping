<?php

namespace Demokn\Dianping\MerchantData;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['merchant_data'] = function ($app) {
            return new Client($app);
        };
    }
}
