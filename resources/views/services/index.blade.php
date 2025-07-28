@extends('layouts.app') {{-- أو أي تخطيط عام تستخدمه --}}

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">الخدمات</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($services as $service)
                <div class="bg-white p-6 rounded shadow">
                    <h2 class="text-xl font-semibold mb-2">{{ $service->title }}</h2>
                    <p class="text-gray-600">{{ $service->description }}</p>
                    <a href="{{ route('services.show', $service) }}" class="text-blue-500 mt-4 inline-block">اقرأ المزيد</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
