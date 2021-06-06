<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\ServerFactory;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ImageController extends Controller
{
    public function show (Filesystem $filesystem, Request $request,string $path) : StreamedResponse {
        $server = ServerFactory::create([
            'driver' => Str::endsWith($path,'.svg') ? 'imagick' : 'gd',
            "response" => new LaravelResponseFactory($request),
            "source" => $filesystem->getDriver(),
            "cache" => $filesystem->getDriver(),
            "cache_path_prefix" => "public/.cache",
            "source_path_prefix" => "public/",
            "base_url" => "images",
        ]);
        return $server->getImageResponse($path, $request->all());

    }
}
