<div class="space-y-5">
    @foreach ($rambles as $ramble)
        <livewire:show-ramble :ramble="$ramble" :key="$ramble->id" />
    @endforeach

    {{ $rambles->links() }}
</div>
