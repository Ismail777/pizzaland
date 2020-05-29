<div>
        @if (session()->has('message'))
            <x-alert :message="session('message')"/>
        @endif
        <div class="flex justify-between">
            <h1 class="text-4xl text-gray-800">Items Categories</h1>
            <div>
                <form wire:submit.prevent="submit" class="flex items-start">
                    <div class="flex flex-col">
                        <input  placeholder="Category name"
                                type="text"
                               class="py-2 px-3 border border-gray-300 mr-3"
                               wire:model="name">
                        @error('name')
                        <span class="text-sm text-red-500 italic">{{ $message }}</span>
                        @enderror
                        <span>Slug: {{$slug}} </span>
                    </div>

                    <button type="submit"
                    class="btn bg-blue-400 hover:bg-blue-300">Save Category</button>
                </form>
            </div>
        </div>
        <ul class="mt-4">
            @foreach($categories as $category)
                <li class="mt-4">
                    <form wire:submit.prevent="updateCategory">
                    <input type="text" value="{{$category->name}}"
                           class="rounded bg-white border-gray-300 py-2 px-3">
                    <i class="ml-3">Slug: {{$category->slug}}</i>
                    </form>
                </li>
            @endforeach
        </ul>
</div>
