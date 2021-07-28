<x-layout>
    <section class=" px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center">Login</h1>
            <form method="POST" action="/login">
                @csrf
                {{-- <div class="mb-6">
                    <label for="username" class="block mb-2 uppercase font-bold text-sx text-gray-700">
                        Username
                    </label>
                    <input type="text" name="username" id="username" class="border border-gray-400 p-2 w-full" required
                        value="{{ old('username') }}">
                    @error('username')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div> --}}
                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase font-bold text-sx text-gray-700">
                        Email
                    </label>
                    <input type="text" name="email" id="email" class="border border-gray-400 p-2 w-full" required
                        value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase font-bold text-sx text-gray-700">
                        Password
                    </label>
                    <input type="password" name="password" id="password" class="border border-gray-400 p-2 w-full"
                        required>
                    @error('password')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <button class="bg-blue-400 text-white rounded py-2 px-4" type="submit">Submit</button>
                </div>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                @endif
            </form>
        </main>
    </section>
</x-layout>
