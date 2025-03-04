@include('layouts.header')

@if (count($users) == 0)
    <x-card title="Kullanıcı Listesi">
        <div class="text-center text-gray-500">
            Henüz hiç kullanıcı eklenmemiş.
        </div>
    </x-card>
@else
    <x-card title="Kullanıcı Listesi">
        <x-table :headers="['ID', 'İsim', 'E-Posta', 'Kayıt Tarihi']">
            @foreach ($users as $row)
                <tr>
                    <td class="py-2 px-2">
                        #{{ $row->id }}
                    </td>
                    <td class="py-2 px-2">
                        <a href="{{ route('users.profile', $row->id) }}"
                            class="text-sm font-medium underline text-blue-500">{{ $row->name }}</a>
                    </td>
                    <td class="py-2 px-2 text-sm">
                        {{ $row->email }}
                    </td>
                    <td class="py-2 px-2 max-w-md text-xs">
                        {{ $row->created_at->diffForHumans() }}
                    </td>
                </tr>
            @endforeach
        </x-table>

        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </x-card>
@endif

@include('layouts.footer')
