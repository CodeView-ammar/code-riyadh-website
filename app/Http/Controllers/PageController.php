<?php

namespace App\Http\Controllers;

// use App\Models\Service;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        // $services = Service::ordered()->get();
        return view('page.index', []);
    }

    // public function show(Service $service)
    // {
        // $relatedServices = Service::where('id', '!=', $service->id)
        //     ->ordered()
        //     ->take(3)
        //     ->get();

        // return view('services.show',[]);
    // }
}
