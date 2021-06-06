<?php


namespace App\Service;


use League\Glide\Urls\UrlBuilderFactory;

class ImagePathGenerator
{
    /**
     * @var \League\Glide\Urls\UrlBuilder
     */
    private $urlBuilder;

    public function __construct()
    {
        $this->urlBuilder = UrlBuilderFactory::create('/images/');
    }

    public function generate(string $path, int $width = null, int $height = null, string $fit='crop') : string
    {
        return $this->urlBuilder->getUrl($path,['w' => $width, 'h' => $height, 'fit' => $fit]);
    }

}
