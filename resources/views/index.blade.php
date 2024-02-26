@extends('layouts.layout')
@section('content')
    
@foreach ($listings as $listig)
@php
    $tags = explode(',', $listig->tags);
@endphp
<div class="bg-gray-50 border border-gray-200 rounded p-6">
    <div class="flex">
            
        <img
        class="hidden w-48 mr-6 md:block"
        src="storage/{{$listig->image}}"
        alt="no img"
        />
        <div>
            <h3 class="text-2xl">
                <a href="/listings/show/{{$listig->id}}">{{$listig->title}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$listig->company}}</div>
            <ul class="flex">
                @foreach ($tags as $tag)
                    <li
                        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                    >
                        <a href="?tag={{$tag}}">{{$tag}}</a>
                    </li>
                    
                @endforeach
            </ul>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{$listig->location}}
            </div>
        </div>
    </div>
</div>
@endforeach
<div>{{$listings->links()}}</div>
@endsection
