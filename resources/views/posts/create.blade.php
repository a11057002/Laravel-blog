<x-layout>
    <section class="px-6 py-8 mx-auto">

        <div class="max-w-sm m-auto bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-lg  font-bold mb-4">
                發表新文章
            </h1>
            <form action="/post/create" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label for="title" class="block mb-2 uppercase font-bold text-sx text-gray-700">
                        標題
                    </label>
                    <input type="text" name="title" id="title" class="border border-gray-400 p-2 w-full" required
                        value="{{ old('title') }}">
                    @error('title')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="thumbnail" class="block mb-2 uppercase font-bold text-sx text-gray-700">
                        縮圖
                    </label>
                    <input type="file" name="thumbnail" id="thumbnail" class="border border-gray-400 p-2 w-full"
                        required value="{{ old('thumbnail') }}">
                    @error('thumbnail')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="excerpt" class="block mb-2 uppercase font-bold text-sx text-gray-700">
                        簡要
                    </label>
                    <input type="text" name="excerpt" id="excerpt" class="border border-gray-400 p-2 w-full" required
                        value="{{ old('excerpt') }}">
                    @error('excerpt')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="slug" class="block mb-2 uppercase font-bold text-sx text-gray-700">
                        網址縮址
                    </label>
                    <input type="text" name="slug" id="slug" class="border border-gray-400 p-2 w-full" required
                        value="{{ old('slug') }}">
                    @error('slug')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="body" class="block mb-2 uppercase font-bold text-sx text-gray-700">
                        內容
                    </label>
                    <textarea name="body" id="body" class="resize:none" required value="{{ old('body') }}" cols="40"rows="20"></textarea>
                    @error('body')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="body" class="block mb-2 uppercase font-bold text-sx text-gray-700">
                        分類
                    </label>
                    <select name="category" id="category">
                        @foreach (\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="hyperlink" class="block mb-2 uppercase font-bold text-sx text-gray-700">
                        Youtube連結
                    </label>
                    <input type="text" name="hyperlink" id="hyperlink" class="border border-gray-400 p-2 w-full"
                        required value="{{ old('hyperlink') }}">
                    @error('hyperlink')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <button class="bg-blue-400 text-white rounded py-2 px-4" type="submit">新增文章</button>
                </div>
            </form>
        </div>
    </section>
</x-layout>
