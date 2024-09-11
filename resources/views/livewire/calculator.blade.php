<div class="container mx-auto w-full">
    <section class="max-w-screen-sm mx-auto">
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">
            <form class="space-y-6" wire:submit.prevent="store">
                <h5 class="text-xl font-medium text-gray-900 text-center">Calculator WinRate</h5>
                
                <div>
                    <label for="totalMatches" class="block mb-2 text-sm font-medium text-gray-900">Total Match</label>
                    <input type="text" wire:model.defer="totalMatches" id="totalMatches" class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                        @error('totalMatches') border-red-500 @else border-gray-300 @enderror" />
                    @error('totalMatches') 
                        <span class="text-sm text-red-600">{{ $message }}</span> 
                    @enderror
                </div>
                
                <div>
                    <label for="currentWinRate" class="block mb-2 text-sm font-medium text-gray-900">Current Win Rate</label>
                    <input type="text" wire:model.defer="currentWinRate" id="currentWinRate" class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                        @error('currentWinRate') border-red-500 @else border-gray-300 @enderror" />
                    @error('currentWinRate') 
                        <span class="text-sm text-red-600">{{ $message }}</span> 
                    @enderror
                </div>

                <div>
                    <label for="requiredWinRate" class="block mb-2 text-sm font-medium text-gray-900">Required Win Rate</label>
                    <input type="text" wire:model.defer="requiredWinRate" id="requiredWinRate" class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                        @error('requiredWinRate') border-red-500 @else border-gray-300 @enderror" />
                    @error('requiredWinRate') 
                        <span class="text-sm text-red-600">{{ $message }}</span> 
                    @enderror
                </div>
                
                <div class="flex flex-col md:flex-row justify-between space-y-2 md:space-y-0 md:space-x-2">
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" wire:loading.attr="disabled" wire:target="store">
                        <span wire:loading.remove wire:target="store">Submit</span>
                        <span wire:loading wire:target="store">
                            <svg wire:loading wire:target="store" aria-hidden="true" role="status" class="inline w-4 h-4 me-1 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                            </svg>
                            Loading...
                        </span>
                    </button>
                </div>
                
                @if (isset($errorMessage))
                    <div class="mt-4 p-4 bg-red-50 border border-red-200 rounded-md">
                        <p class="text-sm text-center font-medium text-red-900">{{ $errorMessage }}</p>
                    </div>
                @elseif (isset($result))
                    <div class="mt-4 p-4 bg-blue-50 border border-blue-200 rounded-md">
                        @if ($result > 0)
                            <h3 class="text-sm text-center font-medium text-blue-900">Kamu butuh {{ number_format($result,0,',','.') }} Win Strike untuk mendapatkan {{ $requiredWinRate }}% Win Rate.</h3>
                        @elseif ($result < 0)
                            <h3 class="text-sm text-center font-medium text-blue-900">Kamu perlu {{ number_format(abs($result), 0,',','.') }} Lose Strike untuk mendapatkan {{ $requiredWinRate }}% Win Rate.</h3>
                        @else
                            <h3 class="text-sm text-center font-medium text-blue-900">Kamu sudah memiliki {{ $requiredWinRate }}% Win Rate dengan hasil saat ini.</h3>
                        @endif
                    </div>
                @endif
            </form>

            <p class="text-center text-sm text-gray-500 mt-4">
                &copy; {{ date('Y') }} <a class="hover:text-blue-800" href="https://facebook.com/hyfan.gt">Rangga Casper</a>. All rights reserved.
            </p>
        </div>
    </section>
</div>