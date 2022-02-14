@props(['post' => $post])

<div class="grid-post-layout">
    <div class="poster-img"><img src="{{ asset($post->user->img_location) }}" alt="face_img" class="contain-image"></div>
    <div>
        <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a> <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
        <p class="mb-2">{{ $post->body }}</p>

        @can('delete', $post)
            <div>
                <form action="{{ route('posts.destroy', $post) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500">Delete</button>
                </form>
            </div>
        @endcan

        <div class="flex items-center">
            @auth
                @if(!$post->likedBy(auth()->user()))
                    <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-4">
                        @csrf
                        <button class="text-blue-500">Like</button>
                    </form>
                @else
                    <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-4">
                        @csrf
                        @method('DELETE')
                        <button class="text-blue-500">Unlike</button>
                    </form>
                @endif
            @endauth
            
            <span>{{ $post->likes->count()}} {{ Str::plural('like', $post->likes->count()) }}</span>
        </div>
    </div>
</div>
<div class="bottom-separator"></div>