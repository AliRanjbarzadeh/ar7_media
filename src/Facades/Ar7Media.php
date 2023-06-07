<?php

namespace Ar7\Media\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method upload(): array {
		id: int,
		path: string,
		mime_type: string,
		options: array,
		visibility: string,
		size: int,
		basename: string,
		created_at: string,
		updated_at: string
 * }
 */
class Ar7Media extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'ar7media';
	}
}