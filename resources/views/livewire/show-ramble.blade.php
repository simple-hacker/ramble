<div class="flex items-center bg-white shadow-xl sm:rounded-lg p-4 sm:px-20 border-b border-gray-200 space-x-10">
    <img src="{{ $ramble->user->profile_photo_url }}" alt="{{ $ramble->user->name }} Avatar" class="rounded-full">
    <div class="flex flex-col w-full">
        <h2 class="text-sm uppercase font-semibold text-gray-400">{{ $ramble->user->name }}</h2>
        
        @if($edit)
            <form wire:submit="saveRamble">
                <textarea
                    x-data
                    @click.away="$wire.saveRamble()"
                    wire:model="ramble.body"
                    wire:keydown.enter="saveRamble"
                    rows="3"
                    class="mt-3 w-full text-gray-500 rounded-lg border shadow p-2 {{ ($errors->first('ramble.body')) ? 'border-red-500 focus:border-red-500 active:border-red-500' : 'border-blue-400 focus:border-blue-400 active:border-blue-400' }}"
                ></textarea>
                @error('ramble.body') <span class="mt-3 text-sms text-red-500 self-center">{{ $message }}</span> @enderror
            <form>
        @else
            <p class="text-lg break-words">{{ $ramble->body }}</p>
        @endif

        <div class="flex items-center mt-2 space-x-3">
            <span class="text-sm text-gray-500">{{ $ramble->created_at->diffForHumans() }}</span>

            @if($ramble->user()->is(auth()->user()))
                <a wire:click="$toggle('edit')" class="hover:underline cursor-pointer text-blue-800 font-semibold">Edit</a>
            @endif
        </div>

        <div class="flex justify-start mt-3 space-x-4">
            <button
                wire:click="like"
                class="flex items-center border border-red-500 text-red-500 hover:bg-red-200 rounded px-4 py-2"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="{{ ($ramble->userHasLiked()) ? 'currentColor' : 'none' }}"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    class="w-4"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
                <span class="ml-1">
                    {{ $ramble->likes->count() }}
                </span>
            </button>

            @if($showPermalink)
                <a href="{{ route('view.ramble', ['ramble' => $ramble]) }}" class="flex items-center border border-blue-700 text-blue-700 hover:bg-blue-200 rounded px-4 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                    </svg>
                </a>
            @endif
        </div>

        @if ($ramble->mostPopularComment)
            <div class="flex flex-col mt-6">
                <h2 class="font-semibold text-sm uppercase">🔥 Hottest Comment</h2>
                <h2 class="text-sm uppercase font-semibold text-gray-400">{{ $ramble->mostPopularComment->user->name }} said...</h2>
                <p class="text-lg break-words">{{ $ramble->mostPopularComment->body }}</p>
            </div>
        @endif
    </div>
</div>