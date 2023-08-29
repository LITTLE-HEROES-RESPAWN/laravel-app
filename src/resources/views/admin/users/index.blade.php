<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            User
        </h2>
    </x-slot>

    @php
        $cls = [
            'th' => 'border-b  font-medium p-4 pt-0 pb-3 text-slate-700  text-left',
            'td' => 'border-b border-slate-100  p-4 text-slate-800 ',
        ];
    @endphp

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white   border-b border-gray-200">
                    <div class="flex mb-4">
                        <p class="font-bold text-lg text-slate-700">{{ $title ?? 'ユーザー一覧' }}</p>
                        {{-- ボタン追加 --}}
                        <x-primary-button class="ml-auto py-0" color="amber.lighten" type="button"
                            onclick="location.href='{{ route('admin.users.download') }}'">
                            CSVダウンロード
                        </x-primary-button>
                    </div>
                    <div class="not-prose relative bg-slate-50 rounded-xl overflow-hidden  ">
                        <div class="absolute inset-0 bg-grid-slate-100
                            [mask-image:linear-gradient(0deg,#fff,rgba(255,255,255,0.6))] "
                            style="background-position: 10px 10px;"></div>
                        <div class="relative rounded-xl overflow-auto">
                            <div class="shadow-sm overflow-hidden my-8">
                                <table class="border-collapse table-fixed w-full text-sm">
                                    <thead>
                                        <tr>
                                            <th class="{{ $cls['th'] }} pl-8">ID</th>
                                            <th class="{{ $cls['th'] }}">名前</th>
                                            <th class="{{ $cls['th'] }} pr-8">登録日</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white ">
                                        @foreach ($users as $user)
                                            <tr class="hover:bg-slate-50 active:bg-slate-100 cursor-pointer"
                                                onclick="location.href='{{ route('admin.users.show', $user->id) }}'">
                                                <td class="{{ $cls['td'] }} pl-8">
                                                    {{ $user->id }}
                                                </td>
                                                <td class="{{ $cls['td'] }}">
                                                    {{ $user->name }}
                                                </td>
                                                <td class="{{ $cls['td'] }} pr-8">
                                                    {{ $user->created_at->format('Y年m月d日 H:i') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="absolute inset-0 pointer-events-none border border-black/5 rounded-xl">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
