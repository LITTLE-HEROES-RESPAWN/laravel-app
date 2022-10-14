<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Article
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <p class="mb-4 font-bold text-lg">記事投稿</p>

                    <form action="{{ route('articles.store') }}" method="post">
                        @csrf
                        <div class="pb-6">
                            <x-input-label for="article-title" value="タイトル" />
                            <x-text-input id="article-title" class="block mt-1 w-full" type="text" name="title"
                                required value="{{ old('title') }}" />
                            <x-input-error :messages="$errors->get('title')" />
                        </div>
                        <div class="pb-6">
                            <x-input-label for="article-content" value="記事内容" />
                            <x-textarea id="article-content" class="block mt-1 w-full" type="textarea" name="content"
                                required rows="10">{{ old('content') }}</x-textarea>
                            <x-input-error :messages="$errors->get('content')" />
                        </div>
                        <div class="flex">
                            <x-primary-button class="ml-auto justify-center w-full md:w-auto" type="submit">送信
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
