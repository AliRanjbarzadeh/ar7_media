<?php

namespace Ar7\Media\Facades;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Facade;

/**
 * @method array upload($file, $path)
 * @method Model medium_model()
 */
class Ar7Media extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'ar7media';
	}
}