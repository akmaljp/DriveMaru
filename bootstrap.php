<?php

/**
* @package   akmaljp\DriveMaru
* @copyright Copyright (c) 2015-2018 The s9e Authors
* @license   http://www.opensource.org/licenses/mit-license.php The MIT License
*/
namespace akmaljp\DriveMaru;

use Flarum\Formatter\Event\Configuring;
use Illuminate\Events\Dispatcher;

function subscribe(Dispatcher $events)
{
	$events->listen(
		ConfigureFormatter::class,
		function (ConfigureFormatter $event)
		{
			$event->configurator->MediaEmbed->add(
				'DriveMaru',
				[
					'host'    => 'drive.bisnison.store',
					'extract' => "!drive\\.bisnison\\.store/video/(?'id'[-0-9A-Z_a-z]+)!",
					'iframe'  => ['src' => 'http://drive.bisnison.store/video/{@id}']
				]
			);
		}
	);
}

return __NAMESPACE__ . '\\subscribe';
