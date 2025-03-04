@include('layouts.header')

<x-card title="Görev Düzenle" :button="route('tasks.index')" :button_name="'Görev Listesi'">
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <x-forms.input name="name" label="Görev Adı" placeholder="Görev Adı" value="{!! $task->name !!}" />

        <x-forms.textarea name="description" label="Görev Açıklaması" rows="6" placeholder="Görev Açıklaması..."
            value="{!! $task->description !!}" />

        <x-forms.button type="submit" variant="success" size="block">Güncelle</x-forms.button>
    </form>
</x-card>

@include('layouts.footer')
