<?php namespace Mobytes\Landpage;

use Illuminate\Support\ServiceProvider;
use Mobytes\Landpage\Media\Repo\MediaRepository;
use Mobytes\Landpage\Media\Repo\Media;
use Mobytes\Landpage\Objective\Repo\ObjectiveRepository;
use Mobytes\Landpage\Objective;
use Mobytes\Landpage\Organization\Repo\OrganizationRepository;
use Mobytes\Landpage\Organization\Repo\Organization;
use Mobytes\Landpage\Publication\Repo\PublicationRepository;
use Mobytes\Landpage\Publication\Repo\Publication;
use Mobytes\Landpage\TypeMedia\Repo\TypeMediaRepository;
use Mobytes\Landpage\TypeMedia\Repo\TypeMedia;

class LandpageServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('mobytes/landpage');
        include __DIR__ . '/routes.php';
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerMedia();
        $this->registerObjective();
        $this->registerOrganization();
        $this->registerPublication();
        $this->registerTypeMedia();
    }

    public function registerMedia()
    {
        $app = $this->app;
        $app->bind('Mobytes\Landpage\Media\Repo\MediaInterface', function ($app) {
            return new MediaRepository(new Media());
        });
    }

    public function registerObjective()
    {
        $app = $this->app;
        $app->bind('Mobytes\Landpage\ObjectiveRepository\Repo\ObjectiveInterface', function ($app) {
            return new ObjectiveRepository(new Objective());
        });
    }

    public function registerOrganization()
    {
        $app = $this->app;
        $app->bind('Mobytes\Landpage\Organization\Repo\OrganizationInterface', function ($app) {
            return new OrganizationRepository(new Organization());
        });
    }

    public function registerPublication()
    {
        $app = $this->app;
        $app->bind('Mobytes\Landpage\Publication\Repo\PublicationInterface', function ($app) {
            return new PublicationRepository(new Publication());
        });
    }

    public function registerTypeMedia()
    {
        $app = $this->app;
        $app->bind('Mobytes\Landpage\TypeMedia\Repo\TypeMediaInterface', function ($app) {
            return new TypeMediaRepository(new TypeMedia());
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('landpage');
    }

}
