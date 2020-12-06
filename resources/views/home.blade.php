<x-app-layout>
    @auth
        <livewire:create-ramble />
    @endauth

    <x-heading>Latest Rambles</x-heading>
    
    <livewire:show-rambles />
    
</x-app-layout>
