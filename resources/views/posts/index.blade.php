<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between space-x-6">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('My posts') }}
            </h2>

            <div>
                <a href="{{ route('posts.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                >
                    {{ __('Create post') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="mt-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full space-y-6 py-2 sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full w-full text-left text-sm font-light">
                                <thead
                                    class="border-b bg-white font-medium dark:border-neutral-500 dark:bg-neutral-600">
                                    <tr>
                                    <th scope="col" class="px-6 py-4">#</th>
                                    <th scope="col" class="px-6 py-4">Author</th>
                                    <th scope="col" class="px-6 py-4">Title</th>
                                    <th scope="col" class="px-6 py-4">Excerpt</th>
                                    <th scope="col" class="px-6 py-4"># words</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                    <tr class="border-b {{ $loop->odd ? 'bg-white' : 'bg-neutral-100' }} dark:border-neutral-500 dark:bg-neutral-700">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">
                                            {{ $post->id }}
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            {{ $post->user->name }}
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            {{ $post->title }}
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            {{ Str::words($post->content, 5, '...') }}
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            {{ Str::wordCount($post->content) }}
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4 space-x-2 flex items-center justify-end text-right">
                                            @can('update', $post)
                                                <a href="{{ route('posts.edit', $post) }}"
                                                    class="text-xs text-blue-500 hover:underline transition"
                                                >
                                                    Edit
                                                </a>
                                            @endcan

                                            <a href="{{ route('posts.show', $post) }}"
                                                class="text-xs text-blue-500 hover:underline transition"
                                            >
                                                Show
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </table>
                            </div>

                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
