<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    @foreach ($posts as $key => $post)

        <article class="max-w-screen-md {{ $key == 0 ? '' : 'py-8 border-b border-gray-300' }}"></article>
            <a href="/posts/{{ $post["slug"] }}" class="hover:underline">
                <h2 class="{{ $key == 0 ? 'mb-1' : 'mb-3 mt-5' }} text-3xl tracking-tighter font-bold text-gray-900">
                    {{ $post["title"] }}</h2>
            </a>

            <div>
                <a href="/authors/{{ $post->author->username }}" class="hover:underline text-base text-gray-500">{{ $post->author->name }}</a> | {{ $post->created_at->diffForHumans() }}
                in
                <a href="/post-categories/{{ $post->category->slug }}" class="hover:underline text-base text-gray-500">{{ $post->category->name }}</a>
                |
                {{ $post->created_at->diffForHumans() }}
            </div>
            <p class="my-4 font-light">
                {{ Str::limit($post["body"], 200) }}
            </p>
            <a href="/posts/{{ $post["slug"] }}" class="font-medium text-blue-500 hover:underline">Read more &raquo;</a>
        </article>

    @endforeach
</x-layout>
