<?php

/**
* @package   akmaljp\drivemaru
* @copyright Copyright (c) 2015-2018 The akmaljp Authors
* @license   http://www.opensource.org/licenses/mit-license.php The MIT License
*/
namespace akmaljp\drivemaru;

use Flarum\Formatter\Event\Configuring;
use Illuminate\Events\Dispatcher;
use s9e\TextFormatter\Configurator\Bundles\MediaPack;

function subscribe(Dispatcher $events)
{
	$events->listen(
		Configuring::class,
		function (Configuring $event)
		{
			$event->configurator->MediaEmbed->add(
				'drivemaru',
				[
					'host'    => 'drive.bisnison.store',
					'extract' => "!drive\\.bisnison\\.store/video\/(?'id'[-0-9A-Z_a-z]+)!",
					'iframe'  => ['src' => 'http://drive.bisnison.store/video/{@id}/']
				]
			);
		}
	);
}

return __NAMESPACE__ . '\\subscribe';
