<x-app-layout>
    <x-slot name="header">
        <div class="flex w-full">
            <h2 class="font-semibold w-3/4 text-sm leading-tight">
                {{ __('Dashboard') }} / <a href="{{route('post.index')}}">Posts</a> / {{$post->title}}
            </h2>
            <div class="w-1/4 text-right">
                <a href="{{route('post.index')}}" class="text-red-500 font-bold">back</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12 min-h-96">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="m-auto w-6/12 font-bold text-blue-500 text-xl">{{$post->title}}</h1>

                @if(empty($post->photo_name))
                <img style="height: 400px" class="h-full w-full object-contain" src="/img/group-school-ico.webp">
            @else
                        <img style="height: 400px" class="h-full w-full object-contain" src="{{asset('storage/'.$post->photo_name)}}">
            @endif
                </div>
            </div>
        </div>
        <div class="max-w-7xl my-2 justify-between flex mx-auto sm:px-6 lg:px-8">
            <div class="text-gray-400 w-1/2">
                By {{$post->user->name }}, Published at {{$post->created_at->diffForHumans()}}
            </div>
            <div class="text-gray-400 w-1/2 text-right">
                @php($tags = $post->tags()->pluck('name','slug')->toArray())
                <x-tag :tags="$tags"></x-tag>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{$post->body}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
