<div x-data="{ show: false, message: '', type: 'success' }" x-show="show" x-transition.opacity
    class="fixed bottom-5 right-5 px-4 py-3 rounded-lg shadow-lg text-white"
    :class="{
        'bg-green-500': type === 'success',
        'bg-blue-500': type === 'info',
        'bg-yellow-500 text-black': type === 'warning',
        'bg-red-500': type === 'error'
    }"
    x-init="@if (session('success')) show = true; message = '{{ session('success') }}'; type = 'success';
        @elseif(session('error'))
            show = true; message = '{{ session('error') }}'; type = 'error';
        @elseif(session('info'))
            show = true; message = '{{ session('info') }}'; type = 'info';
        @elseif(session('warning'))
            show = true; message = '{{ session('warning') }}'; type = 'warning'; @endif
    
    if (show) {
        setTimeout(() => show = false, 3000); // 3 saniye sonra kaybol
    }">
    <span x-text="message"></span>
</div>
