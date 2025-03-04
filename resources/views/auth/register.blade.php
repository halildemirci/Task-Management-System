@include('layouts.header')

<x-card title="Kayıt Ol" :button="route('auth.login')" :button_name="'Giriş Yap'">
    <form action="{{ route('auth.storeUser') }}" method="POST">
        @csrf

        <x-forms.input name="name" label="Adın" placeholder="Adın" required autocomplete="new-password" />
        <x-forms.input name="email" label="E-Posta Adresi" placeholder="E-Posta Adresi" required autocomplete="new-password" />
        <x-forms.input name="password" label="Şifre" placeholder="Şifre" type="password" required autocomplete="new-password" />

        <x-forms.button type="submit" variant="success" size="block">Kayıt Ol</x-forms.button>
    </form>
</x-card>

@include('layouts.footer')
