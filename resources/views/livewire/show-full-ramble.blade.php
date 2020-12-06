<div class="space-y-6">
    <livewire:show-ramble :ramble="$ramble" :key="'ramble_' . $ramble->id" :showPermalink="false"/>

    <x-heading>Comments</x-heading>

    <livewire:create-comment :ramble="$ramble"/>

    @foreach ($ramble->comments as $comment)
        <livewire:show-comment :comment="$comment" :key="'comment_' . $comment->id" />
    @endforeach
</div>
