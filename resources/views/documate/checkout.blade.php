<x-main-layouts>
    <x-slot name="title">
        CHECKOUT
    </x-slot>
    @if (session()->has('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
    @endif
    <section class=" mx-auto" style=" width:100%; overflow:scroll;">
        <h5 class="my-3 mx-5">DocuMate | CHECKOUT</h3>
        @livewire('checkout', ['id' => $id])
        <div class="my=2"></div>
    </section>
</x-main-layouts>