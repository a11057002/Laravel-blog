@props(['post'])

<article {{-- $attribute('class' => 'xxx')  was identical with situation below --}}
    {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
    <div class="py-6 px-5">
        <div class="h-96 w-96 m-auto">
            <img src="{{asset('storage/'.$post->thumbnail)}}" alt="Blog Post illustration" class="rounded-lg w-full h-full">
        </div>

        <div class="mt-8 flex flex-col justify-between">
            <header>
                <x-category-label :category="$post->category" />

                <div class="mt-4">
                    <h1 class="text-3xl">
                        {{ $post->title }}
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $post->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-4">
                <p>
                    {!! $post->body !!}
                </p>
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="https://i.pravatar.cc/100?u={{$post->user_id}}" alt="Lary avatar">
                    <div class="ml-3">
                        <a href="/user/{{ $post->user->name }}">
                            <h5 class="font-bold">
                                {{ $post->user->name }}
                            </h5>
                        </a>
                    </div>
                </div>

                <div>
                    <a href="/post/{{ $post->slug }}"
                        class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">Read
                        More</a>
                </div>
            </footer>
        </div>
    </div>
</article>
