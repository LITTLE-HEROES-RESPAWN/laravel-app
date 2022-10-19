<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            User
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white   border-b border-gray-200">

                    <div class="flex mb-4">
                        <p class="font-bold text-lg text-slate-700">ユーザー詳細</p>
                    </div>

                    <div class="not-prose relative bg-slate-50 rounded-xl overflow-hidden  ">
                        <div class="relative rounded-xl overflow-auto border-2 border-slate-100">
                            <div class="overflow-hidden my-8">
                                <h2 class="text-3xl text-slate-600 font-bold px-4">{{ $user->name }}</h2>
                                <hr class="border m-2 mb-4">
                                <p class="px-4 pb-4 text-slate-700 inline-flex w-full">ユーザーID:
                                    <span class="ml-auto">{{ $user->id }}</span>
                                </p>
                                <p class="px-4 pb-4 text-slate-700 inline-flex w-full">メールアドレス:
                                    <span class="ml-auto">{{ $user->email }}</span>
                                </p>
                                <p class="px-4 pb-4 text-slate-700 inline-flex w-full">ログインID:
                                    <span class="ml-auto">{{ $user->login_id }}</span>
                                </p>
                                <p class="px-4 pb-4 text-slate-700 inline-flex w-full">登録日:
                                    <span class="ml-auto">{{ $user->created_at->format('Y年m月d日 H:i') }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-auto mt-4">
                        <x-primary-button class="mr-auto justify-center w-full md:w-auto" type="button"
                            onclick="location.href='{{ route('admin.users.index') }}'" color="gray.lighten">一覧へ
                        </x-primary-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
