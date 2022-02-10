@extends('layouts.app')

@section('content')
    <div class="main-content-layout">
        <div class="w-8/12 dartpad-nav-theme p-6 rounded-lg mb-2">
            <form action="{{ route('posts') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea 
                        name="body" 
                        id="body" 
                        cols="30" 
                        rows="4" 
                        class="dartpad-nav-theme border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" 
                        style="white-space: normal;" 
                        placeholder="Post something!"
                    >
                    </textarea>

                    @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">
                        Post
                    </button>
                </div>
            </form>
        </div>
        <div class="w-8/12 dartpad-nav-theme p-6 rounded-lg">
            @if ($posts->count())
                @foreach($posts as $post)
                    <div class="grid-post-layout">
                        <div style="height: 3rem; width: auto;"><img src="{{ asset($post->user->img_location) }}" alt="face_img" style="height: 100%; width: 100%; object-fit: contain;"></div>
                        <div>
                            <a href="" class="font-bold">{{ $post->user->name }}</a> <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
                            <p class="mb-2">{{ $post->body }}</p>
                        </div>
                    </div>
                @endforeach
            @else
                <p>There are no posts to show.</p>
            @endif
        </div>
    </div>
@endsection