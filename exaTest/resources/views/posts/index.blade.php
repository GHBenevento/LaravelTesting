@extends('layouts.app')
@section('title','Index')

@section('content')
<section class="antialiased bg-gray-100 text-gray-600 h-screen px-4">
    <div class="mb-10 ">
        <div class="mb-5">
            <h2 class="text-xl">@lang("Posts")</h2>
        </div>
        @auth
        @can('create', \App\Models\Post::class)
        <div class="mt-5">
            <a class="text-green-400 no-underline border-solid border-2 border-green-400 rounded p-1 ml-5 hover:bg-green-400 hover:text-white" href="{{ route('contacts.create') }}">➕
                @lang("Add Post")</a>
        </div>
        @endcan
        @endauth
    </div>
    <div class="w-full max-w-8xl mx-auto bg-white shadow-lg rounded border border-gray-200">
        <div class="p-3">
            <div class="overflow-x-auto">
                <table class="table-auto w-full">
                    <thead class="text-xs font-semibold uppercase text-gray-400">
                        <tr>
                            @auth
                            @can('viewAll',
                            \App\Models\Post::class)
                            <div class="font-semibold text-left">@lang("User Name")</div>
                            </th>
                            @endcan
                            @endauth
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">@lang("Title")</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">@lang("Extract")</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">@lang("Content")</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">@lang("Expires")</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">@lang("Comment")</div>
                            </th>
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">@lang("Access")</div>
                            </th>

                            @auth
                            @can('viewAllAndDeleted',
                            \App\Models\Post::class)
                            <th class="p-2 whitespace-nowrap">
                                <div class="font-semibold text-left">@lang("Deleted at")</div>
                            </th>
                            @endcan
                            @endauth
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-gray-100">
                        @foreach ($data as $post)
                        <tr>
                            @auth
                            @can('viewAll',
                            \App\Models\Post::class)
                            <td class="p-2 whitespace-nowrap">{{$post->user->name }}</td>
                            @endcan
                            @endauth
                            <td class="p-2 whitespace-nowrap">{{$post->title }}</td>
                            <td class="p-2 whitespace-nowrap">{{$post->extract }}</td>
                            <td class="p-2 whitespace-nowrap">{{$post->content }}</td>
                            <td class="p-2 whitespace-nowrap">{{$post->expires }}</td>
                            <td class="p-2 whitespace-nowrap">{{$post->comment }}</td>
                            <td class="p-2 whitespace-nowrap">{{$post->access }}</td>
                            <td class="p-2 whitespace-nowrap">
                                <form action="{{url('/posts/'.$post->id) }}" method="POST">
                                  @csrf
                                  {{ method_field('DELETE')}}
                                    <button type="submit" class="text-red-400 no-underline border-solid border-2 border-red-400 rounded p-1px-3 ml-5 hover:bg-red-400 hover:text-white" value="Delete">
                                        @lang("Delete")
                                    </button>

                                {{-- </form action="{{url('/edit/'.$post->id) }}" method="GET">
                                    @csrf
                                {{ method_field('PATCH')}}
                                <button type="submit" class="text-red-400 no-underline border-solid border-2 border-red-400 rounded p-1px-3 ml-5 hover:bg-red-400 hover:text-white" value="Edit">
                                    @lang("Edit")
                                </button>
                                </form> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection
