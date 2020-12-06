<div class="flex items-center bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 sm:px-20 border-b border-gray-200 space-x-10">
    <div>
        <x-jet-application-logo class="block h-24 w-auto" />
    </div>
    <div class="flex flex-col w-full">
        <div class="text-2xl">
            What do you want to ramble about?
        </div>
        
        <form wire:submit.prevent="postRamble" class="flex flex-col">
            <textarea
                wire:model="body"
                wire:keydown.enter="postRamble"
                name="ramble"
                id="ramble"
                rows="3"
                class="mt-3 w-full text-gray-500 rounded-lg border shadow p-2 {{ ($errors->first('body')) ? 'border-red-500 focus:border-red-500 active:border-red-500' : 'border-blue-400 focus:border-blue-400 active:border-blue-400' }}"
            ></textarea>
            @error('body') <span class="mt-3 text-sms text-red-500 self-center">{{ $message }}</span> @enderror
            <div class="flex mt-4 justify-end">
                <div>
                    <span
                        class="mr-4 {{ ($this->charactersRemaining < 0) ? 'text-red-500' : (($this->charactersRemaining < 10) ? 'text-yellow-500' : 'text-gray-900') }}"
                    >{{ $this->charactersRemaining }} characters remaining</span>
                    <button
                        wire:loading.attr="disabled"
                        type="submit"
                        class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-400 active:bg-blue-400 focus:outline-none focus:border-blue-400 focus:shadow-outline-blue disabled:opacity-25 transition ease-in-out duration-150"
                        @if($this->disabled) disabled @endif
                    >
                        <svg
                            wire:loading.delay
                            class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        >
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span>
                            Ramble!
                        </span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>