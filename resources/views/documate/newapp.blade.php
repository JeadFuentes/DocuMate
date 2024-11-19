<x-main-layouts>
    <x-slot name="title">
        NEW APPLICATION
    </x-slot>
    <section class=" mx-auto" style=" width:100%; overflow:scroll;">
        @if (session()->has('message'))
            <div class="alert alert-success mt-3">
                {{ session('message') }}
            </div>
        @endif
        <h5 class="my-3 mx-5">DocuMate | New Application</h3>
        @livewire('application')
        <div class="my=2"></div>
    </section>
</x-main-layouts>