<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\PUblisherService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PublisherAction 
{
    private $publisher;

    public function __construct(Request $request)
    {
        $this->publisher = $publisher;
    }

    public function create(Request $request)
    {
        if ($this->publisher->exist($request->name)) {
            return response('', Response::HTTP_OK);
        }
        $id = $this->publisher->store($request->name, $request->address);
        return response('', Response::HTTP_CREATED)
            ->header('Location', '/api/publishers/' . $id);

    }
}