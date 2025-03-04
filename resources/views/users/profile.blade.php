@include('layouts.header')

@if (count($tasks) == 0)
    <x-card title="Görev Listesi" :button="route('tasks.create')" :button_name="'Yeni Görev Ekle'">
        <div class="text-center text-gray-500">
            Henüz hiç görev eklenmemiş.
        </div>
    </x-card>
@else
    <x-card title="{{ $tasks[0]->user->name }}, Görev Listesi" :button="route('tasks.create')" :button_name="'Yeni Görev Ekle'">
        <x-table :headers="['ID', 'Kullanıcı', 'Başlık', 'Açıklama', 'Durum', 'İşlemler']">
            @foreach ($tasks as $row)
                <tr>
                    <td class="py-2 px-2">
                        #{{ $row->id }}
                    </td>
                    <td class="py-2 px-2">
                        <a href="{{ route('users.profile', $row->user->id) }}"
                            class="text-sm font-medium underline text-blue-500">{{ $row->user->name }}</a>
                    </td>
                    <td class="py-2 px-2 text-sm">
                        {{ $row->name }}
                    </td>
                    <td class="py-2 px-2 max-w-md text-xs">
                        {{ $row->description }}
                    </td>
                    <td class="py-2 px-2">
                        @switch($row->status)
                            @case('pending')
                                <x-badge type="warning">Bekliyor</x-badge>
                            @break

                            @case('cancelled')
                                <x-badge type="danger">İptal Edildi</x-badge>
                            @break

                            @case('completed')
                                <x-badge type="success">Tamamlandı</x-badge>
                            @break

                            @default
                        @endswitch
                    </td>
                    <td class="py-2 px-2">
                        @if ($row->status == 'pending')
                            <x-forms.button variant="success" size="sm"
                                onclick="markAsCompleted({{ $row->id }})">Tamamla</x-forms.button>
                        @endif
                        <x-forms.button variant="primary" size="sm">
                            <a href="{{ route('tasks.edit', $row->id) }}">Düzenle</a>
                        </x-forms.button>
                        <x-forms.button variant="danger" size="sm"
                            onclick="deleteTask({{ $row->id }})">Sil</x-button>
                    </td>
                </tr>
            @endforeach
        </x-table>

        <div class="mt-4">
            {{ $tasks->links() }}
        </div>
    </x-card>
@endif

<script>
    function markAsCompleted(taskId) {
        if (!confirm("Bu görevi tamamlamak istediğinizden emin misiniz?")) return;

        fetch(`/task/completed/${taskId}`, {
                method: "PATCH",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({})
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.reload();
                }
            })
            .catch(error => console.error("Error:", error));
    }

    function deleteTask(taskId) {
        if (!confirm("Bu görevi silmek istediğinizden emin misiniz?")) return;

        fetch(`/task/delete/${taskId}`, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                    "Content-Type": "application/json"
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.reload();
                }
            })
            .catch(error => console.error("Error:", error));
    }
</script>

@include('layouts.footer')
