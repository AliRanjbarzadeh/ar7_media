<?php

namespace Ar7\Media\Facades;

use Illuminate\Support\Facades\Facade;

class Ar7Media extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'ar7media';
	}
}