<x-layout>
    @include('posts.header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())
            <x-post-feature-card :post="$posts[0]"></x-post-feature-card>

            <div class="lg:grid lg:grid-cols-6">
                @foreach ($posts->skip(1) as $post)
                    <x-post-card :post="$post" class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}">
                    </x-post-card>
                @endforeach
            </div>
            {{ $posts->links() }}
            {{-- <div class="lg:grid lg:grid-cols-3">
                <x-post-card></x-post-card>
                <x-post-card></x-post-card>
                <x-post-card></x-post-card>
            </div> --}}
        @else
            <p class="text-center"> No posts yet.</p>
        @endif
    </main>
</x-layout>
