<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @auth
                <livewire:create-ramble />
            @endauth

            <div class="mt-6">
                <div class="flex justify-center bg-blue-100 p-8 mb-5 border border-blue-300 rounded shadow">
                    <h2 class="text-3xl font-bold tracking-widest uppercase text-blue-900">Latest Rambles</h2>
                </div>
                <livewire:show-rambles />
            </div>
        </div>
    </div>
</x-app-layout>
