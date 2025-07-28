@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4">{{ $service->title }}</h1>
        <p class="mb-6 text-gray-700">{{ $service->description }}</p>

        <h2 class="text-2xl font-semibold mt-10 mb-4">خدمات ذات صلة</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($relatedServices as $related)
                <div class="bg-gray-100 p-4 rounded">
                    <h3 class="text-lg font-semibold">{{ $related->title }}</h3>
                    <a href="{{ route('services.show', $related) }}" class="text-blue-500 mt-2 inline-block">عرض الخدمة</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
