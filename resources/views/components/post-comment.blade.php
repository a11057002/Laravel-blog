@props(['comment'])

<article class="flex bg-gray-100 p-6 rounded-xl border-gray-200 space-x-3">
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/100?u={{$comment->user_id}}" alt="" width="80" height="80" class="rounded">
    </div>
    <div>
        <header class="mb-4">
            <strong>
                <h3 class="font-bold">
                    {{ $comment->user->name }}
                </h3>
                <p class="text-xs">Posted <time>{{ $comment->created_at->format("F j, Y, g:i a") }}</time></p>
            </strong>
        </header>
        <p>
            {{ $comment->body }}
        </p>
    </div>
</article>
