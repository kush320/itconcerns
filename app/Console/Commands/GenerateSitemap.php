<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Resource;
use App\Models\Service;
use App\Models\Training;
use App\Models\Career;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically Generate XML Sitemap';

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
     * @return int
     */
    public function handle()
    {
 
        $sitemap = Sitemap::create(config('app.url'));


        $sitemap->add(Url::create('/')
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setLastModificationDate(now()));

        $sitemap->add(Url::create('/about-us')
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            ->setLastModificationDate(now()));

        $sitemap->add(Url::create('/contact-us')
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            ->setLastModificationDate(now()));

        $sitemap->add(Url::create('/downloads')
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            ->setLastModificationDate(now()));

        $sitemap->add(Url::create('/service')
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            ->setLastModificationDate(now()));

        $sitemap->add(Url::create('/career')
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            ->setLastModificationDate(now()));

        $sitemap->add(Url::create('/partners')
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            ->setLastModificationDate(now()));

        $sitemap->add(Url::create('/product')
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            ->setLastModificationDate(now()));

        $sitemap->add(Url::create('/training')
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            ->setLastModificationDate(now()));

        $sitemap->add(Url::create('/resource')
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            ->setLastModificationDate(now()));

        // Add dynamic URLs from the database
        foreach (Resource::all() as $resource) {
            $sitemap->add(Url::create("/resource/{$resource->slug}")
                ->setLastModificationDate($resource->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY));
        }

        foreach (Service::all() as $service) {
            $sitemap->add(Url::create("/service/{$service->slug}")
                ->setLastModificationDate($service->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY));
        }

         foreach (Training::all() as $training) {
             $sitemap->add(Url::create("/training/{$training->slug}")
                 ->setLastModificationDate($training->updated_at)
                 ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY));
         }

        foreach (Career::all() as $career) {
            $sitemap->add(Url::create("/career/{$career->slug}")
                ->setLastModificationDate($career->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY));
        }

       
        $sitemap->writeToFile(public_path('sitemap.xml'));

       
        $this->info('Sitemap has been generated successfully.');
    }
}
