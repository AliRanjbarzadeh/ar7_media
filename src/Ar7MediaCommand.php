<?php

namespace Ar7\Media;

use Illuminate\Console\Command;

class Ar7MediaCommand extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'ar7:media';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = "Update media package";

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function handle()
	{
		$this->rrmdir(base_path('public/ar7/media'));
	}

	private function rrmdir($src)
	{
		$dir = opendir($src);
		while (FALSE !== ($file = readdir($dir))) {
			if (($file != '.') && ($file != '..')) {
				$full = $src . '/' . $file;
				if (is_dir($full)) {
					$this->rrmdir($full);
				} else {
					unlink($full);
				}
			}
		}
		closedir($dir);
		rmdir($src);
	}
}