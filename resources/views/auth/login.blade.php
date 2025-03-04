@include('layouts.header')

<x-card title="Giriş Yap" :button="route('auth.register')" :button_name="'Kayıt Ol'">
    <form action="{{ route('auth.authenticate') }}" method="POST">
        @csrf

        <x-forms.input name="email" label="E-Posta Adresi" placeholder="E-Posta Adresi" required />
        <x-forms.input name="password" label="Şifre" placeholder="Şifre" type="password" required />

        <x-forms.button type="submit" variant="success" size="block">Giriş Yap</x-forms.button>
    </form>
</x-card>

@include('layouts.footer')
