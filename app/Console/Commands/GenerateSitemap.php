<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

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
    protected $description = 'Generate the sitemap.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        SitemapGenerator::create(config('app.url'))
            ->hasCrawled(function (Url $url) {
                // Set low priority on the different pages of the list of signatures
                if (str_contains(parse_url($url->url)['query'] ?? '', 'page')) {
                    $url->setPriority(0.1);
                }
                return $url;
            })
            ->writeToFile(public_path('sitemap.xml'));
        return 0;
    }
}
