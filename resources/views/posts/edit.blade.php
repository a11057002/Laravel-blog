<x-layout>
    <section class="px-6 py-8 mx-auto">

        <div class="max-w-sm m-auto bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-lg  font-bold mb-4">
                更新文章
            </h1>
            <form action="/post/{{ $post->slug }}/edit" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label for="title" class="block mb-2 uppercase font-bold text-sx text-gray-700">
                        Title
                    </label>
                    <input type="text" name="title" id="title" class="border border-gray-400 p-2 w-full" required
                        value="{{ $post->title }}">
                    @error('title')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="thumbnail" class="block mb-2 uppercase font-bold text-sx text-gray-700">
                        thumbnail
                        <img src="{{ asset('/storage/' . $post->thumbnail) }}" alt="thumbnail" width="80" height="80">
                    </label>
                    <input type="file" name="thumbnail" id="thumbnail" class="border border-gray-400 p-2 w-full"
                        value="{{ $post->thumbnail }}">
                    @error('thumbnail')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="excerpt" class="block mb-2 uppercase font-bold text-sx text-gray-700">
                        Excerpt
                    </label>
                    <input type="text" name="excerpt" id="excerpt" class="border border-gray-400 p-2 w-full" required
                        value="{{ $post->excerpt }}">
                    @error('excerpt')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="slug" class="block mb-2 uppercase font-bold text-sx text-gray-700">
                        slug
                    </label>
                    <input type="text" name="slug" id="slug" class="border border-gray-400 p-2 w-full" required
                        value="{{ $post->slug }}">
                    @error('slug')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="body" class="block mb-2 uppercase font-bold text-sx text-gray-700">
                        Body
                    </label>
                    <textarea name="body" id="body" class="resize:none" required cols="40" rows="20"
                        value="  {{ $post->body }}">
                    </textarea>
                    @error('body')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="body" class="block mb-2 uppercase font-bold text-sx text-gray-700">
                        Category
                    </label>
                    <select name="category" id="category">
                        {{-- TODO: pass in categories --}}
                        @foreach (App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <button class="bg-blue-400 text-white rounded py-2 px-4" type="submit">Update</button>
                </div>
            </form>
        </div>
    </section>
</x-layout>
