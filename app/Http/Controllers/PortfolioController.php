<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $query = Portfolio::query()->ordered();
        
        if ($request->has('category') && $request->category) {
            $query->where('category', $request->category);
        }
        
        $portfolios = $query->paginate(12);
        $categories = Portfolio::distinct()->pluck('category');
        
        return view('portfolio.index', compact('portfolios', 'categories'));
    }

    public function show(Portfolio $portfolio)
    {
        $relatedPortfolios = Portfolio::where('category', $portfolio->category)
            ->where('id', '!=', $portfolio->id)
            ->ordered()
            ->take(3)
            ->get();

        return view('portfolio.show', compact('portfolio', 'relatedPortfolios'));
    }
}
