<?php

namespace Superman2014\Observers;

use Cache;

trait ObserverCache
{
	protected function clearCacheTags($tags) {
		Cache::tags($tags)->flush();
	}

	protected function forgetCache($tags, $id) {
		Cache::tags($tags)->forget($id);
	}

}

