<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            Article
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white   border-b border-gray-200">

                    <p class="mb-4 font-bold text-lg text-red-700">最終確認</p>
                    <p class="mb-4 text-red-700 font-bold">
                        ※完全削除されたデータは2度と復元することができません。<br>
                        本当に削除しますか？
                    </p>

                    <div class="not-prose relative bg-slate-50 rounded-xl overflow-hidden  ">
                        <div class="relative rounded-xl overflow-auto border-2 border-slate-100">
                            <div class="overflow-hidden my-8">
                                <h2 class="text-3xl text-slate-600 font-bold px-4">{{ $article->title }}</h2>
                                <hr class="border m-2 mb-4">
                                <p class="px-4 text-slate-700">{{ $article->content }}</p>
                            </div>
                        </div>
                    </div>

                    <form class="mt-4" action="{{ route('articles.forceDelete', $article->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <div class="flex flex-wrap-reverse ">
                            <x-primary-button class="mr-auto justify-center w-full md:w-auto" color=gray.lighten
                                type="button" onclick="history.back()">戻る</x-primary-button>
                            <x-primary-button class="ml-auto justify-center w-full md:w-auto  mb-3 md:mb-0"
                                type="submit" color="red">
                                削除する
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
