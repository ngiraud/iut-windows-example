<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between space-x-6">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Post: :name', ['name'  => $post->name]) }}
            </h2>

            <div class="flex items-center justify-end space-x-4">
                <a href="{{ route('posts.edit', $post) }}"
                    class="flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                >
                    {{ __('Edit post') }}
                </a>

                @can('delete', $post)
                    <x-danger-button
                        x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'confirm-post-deletion')"
                    >{{ __('Delete Post') }}</x-danger-button>

                    <x-modal name="confirm-post-deletion" :show="$errors->postDeletion->isNotEmpty()" focusable>
                        <form method="post" action="{{ route('posts.destroy', $post) }}" class="p-6">
                            @csrf
                            @method('delete')

                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Are you sure you want to delete this post?') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Once this post is deleted, all of its resources and data will be permanently deleted.') }}
                            </p>

                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('Cancel') }}
                                </x-secondary-button>

                                <x-danger-button class="ml-3">
                                    {{ __('Delete Post') }}
                                </x-danger-button>
                            </div>
                        </form>
                    </x-modal>
                @endcan
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                   <section class="space-y-6">
                        <div>
                            <h3 class="text-xl font-semibold">Title</h3>
                            <div class="mt-2">
                                {{ $post->title }}
                            </div>
                        </div>

                        <div>
                            <h3 class="text-xl font-semibold">Content</h3>
                            <div class="mt-2">
                                {{ $post->content }}
                            </div>
                        </div>
                   </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
