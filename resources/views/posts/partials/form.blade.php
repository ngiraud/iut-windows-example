@php
    $uri = request()->routeIs('posts.edit') ? route('posts.update', $post) : route('posts.store');
    $method =  request()->routeIs('posts.edit') ? 'put': 'post';
@endphp
<section>
    <form method="post" action="{{ $uri }}" class="mt-6 space-y-6">
        @csrf
        @method($method)

        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $post->title)" />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>

        <div>
            <x-input-label for="content" :value="__('Content')" />
            <textarea name="content"
                      id="content"
                      class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
            >{{ old('content', $post->content) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('content')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'post-saved')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
