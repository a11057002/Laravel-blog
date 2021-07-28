  <x-dropdown>
      <x-slot name="trigger">
          <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 flex text-left lg:inline-flex">
              {{ $currentCategory ?? 'Category' }}
              <x-icon name="down-arrow" />
          </button>
      </x-slot>
      <x-dropdown-item href="/" :active="false">All</x-dropdown-item>
      @foreach ($categories as $category)
          <x-dropdown-item href="/?category={{ $category->name }}&{{http_build_query(request()->except('category','page'))}}"
              :active='($currentCategory ?? "")  == $category->name'>
              {{ ucwords($category->name) }}
          </x-dropdown-item>
      @endforeach
  </x-dropdown>
