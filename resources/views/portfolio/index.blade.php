
@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-6">أعمال البورتفوليو</h1>

        @if($portfolios->isEmpty())
            <p class="text-gray-600">لا توجد أعمال حالياً.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($portfolios as $portfolio)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        @if($portfolio->image)
                            <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{ $portfolio->title }}" class="w-full h-48 object-cover">
                        @endif
                        <div class="p-4">
                            <h2 class="text-xl font-semibold mb-2">{{ $portfolio->title }}</h2>
                            <p class="text-gray-700 text-sm mb-4">{{ Str::limit($portfolio->description, 100) }}</p>
                            @if($portfolio->button_link && $portfolio->button_text)
                                <a href="{{ $portfolio->button_link }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                                    {{ $portfolio->button_text }}
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
