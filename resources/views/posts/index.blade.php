<x-layout>
    @include('posts.header')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())
            <x-post-feature-card :post="$posts[0]"></x-post-feature-card>

            <div class="lg:grid lg:grid-cols-6">
                @foreach ($posts->skip(1) as $post)
                    <x-post-card :post="$post" class="col-span-3">
                    </x-post-card>
                @endforeach
            </div>
            {{ $posts->links() }}
        @else
            <p class="text-center"> No posts yet.</p>
        @endif
    </main>
</x-layout>
<div>

</div>
{{-- <x-post-card :post="$post" class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}">
                    </x-post-card> --}}
