<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            Article
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white   border-b border-gray-200">

                    <div class="flex mb-4">
                        <p class="font-bold text-lg text-slate-700">記事編集</p>
                        {{-- ボタンの削除 --}}
                    </div>

                    <div class="not-prose relative bg-slate-50 rounded-xl overflow-hidden  ">
                        <div class="relative rounded-xl overflow-auto border-2 border-slate-100">
                            <div class="overflow-hidden my-8">
                                <h2 class="text-3xl text-slate-600 font-bold px-4">{{ $article->title }}</h2>
                                <hr class="border m-2 mb-4">
                                <p class="px-4 text-slate-700">{{ $article->content }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-auto mt-4">
                        {{-- リンクの変更 --}}
                        <x-primary-button class="mr-auto justify-center w-full md:w-auto bg-slate-700" type="button"
                            onclick="location.href='{{ route('admin.articles.index') }}'" color="gray.lighten">記事一覧へ
                        </x-primary-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
