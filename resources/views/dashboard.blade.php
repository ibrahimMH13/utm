<x-app-layout>
    <x-slot name="header">
        <div class="flex w-full">
            <h2 class="font-semibold w-3/4 text-sm leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <div class="w-1/4 text-right">
                <a href="{{route('post.create')}}" class="text-green-700 font-bold">Add</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  @include('posts.index')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
