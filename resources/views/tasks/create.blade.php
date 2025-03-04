@include('layouts.header')

<x-card title="Yeni Görev Ekle" :button="route('tasks.index')" :button_name="'Görev Listesi'">
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <x-searchable-select name="user_id" :options="$users" placeholder="Kullanıcı Seçin"
            emptyMessage="Sonuç bulunamadı." />

        <x-forms.input name="name" label="Görev Adı" placeholder="Görev Adı" />

        <x-forms.textarea name="description" label="Görev Açıklaması" rows="6" placeholder="Görev Açıklaması..." />

        <x-forms.button type="submit" variant="success" size="block">Kaydet</x-forms.button>
    </form>
</x-card>

@include('layouts.footer')
