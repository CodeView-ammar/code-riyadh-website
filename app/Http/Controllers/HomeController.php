<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Client;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::active()->ordered()->get();
        $services = Service::featured()->ordered()->take(6)->get();
        $portfolios = Portfolio::featured()->ordered()->take(6)->get();
        $clients = Client::featured()->ordered()->take(8)->get();
        $blogPosts = BlogPost::published()->latest()->take(3)->get();

        return view('home', compact('banners', 'services', 'portfolios', 'clients', 'blogPosts'));
    }
}
