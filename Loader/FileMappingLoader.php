<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2008 - 2014 Asikart.com. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Windwalker\Loader\Loader;

/**
 * Class FileMappingLoader
 *
 * @since {DEPLOY_VERSION}
 */
class FileMappingLoader extends AbstractLoader
{
	/**
	 * Property maps.
	 *
	 * @var  array
	 */
	protected $maps = array();

	/**
	 * addMap
	 *
	 * @param string $class
	 * @param string $path
	 *
	 * @return  FileMappingLoader
	 */
	public function addMap($class, $path)
	{
		$class = static::normalizeClass($class);

		$path = static::normalizePath($path, false);

		$this->maps[$class] = $path;

		return $this;
	}

	/**
	 * Loads the given class or interface.
	 *
	 * @param string $className The name of the class to load.
	 *
	 * @return FileMappingLoader
	 */
	public function loadClass($className)
	{
		foreach ($this->maps as $name => $path)
		{
			if (strtolower($name) == strtolower($className))
			{
				$this->requireFile($this->maps[$name]);

				break;
			}
		}

		return $this;
	}
}

