<?php namespace Royalcms\Component\Gravatar;

use Royalcms\Component\Support\ServiceProvider;
use Royalcms\Component\Foundation\AliasLoader;

class GravatarerServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
	    // Register 'gravatarer' instance container to our 'Gravatarer' object
	    $this->royalcms['gravatarer'] = $this->royalcms->share(function($royalcms)
	    {
            // create new instance
            $gravatarer = new Gravatarer();

    		// return gravatarer
	        return $gravatarer;
	    });

	    // Shortcut so developers don't need to add an Alias in app/config/app.php
	    $this->royalcms->booting(function()
	    {
	        $loader = AliasLoader::getInstance();
	        $loader->alias('Gravatarer', 'Royalcms\Component\Facades\Gravatarer');
	    });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
