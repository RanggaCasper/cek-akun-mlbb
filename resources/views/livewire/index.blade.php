<div class="container mx-auto w-full">
    <section class="max-w-screen-sm mx-auto">
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">
            <form class="space-y-6" wire:submit.prevent="store">
                <h5 class="text-xl font-medium text-gray-900 text-center">Mobile Legends</h5>
                
                <div>
                    <label for="userId" class="block mb-2 text-sm font-medium text-gray-900">UserID</label>
                    <input type="number" wire:model.defer="userId" id="userId" class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                        @error('userId') border-red-500 @else border-gray-300 @enderror" />
                    @error('userId') 
                        <span class="text-sm text-red-600">{{ $message }}</span> 
                    @enderror
                </div>
                
                <div>
                    <label for="zoneId" class="block mb-2 text-sm font-medium text-gray-900">ZoneID</label>
                    <input type="number" wire:model.defer="zoneId" id="zoneId" class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                        @error('zoneId') border-red-500 @else border-gray-300 @enderror" />
                    @error('zoneId') 
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
                                
            </form>
            
            @if($result)
                @if(isset($result['data']))
                    <div class="w-full bg-white border border-gray-200 shadow rounded-lg p-5 mt-3">
                        <h2 class="text-lg font-semibold text-gray-900 mb-2">Hasil</h2>
                        <address class="relative bg-gray-50 p-4 rounded-lg border border-gray-200 not-italic flex flex-col gap-y-4" id="contact-details">
                            <div class="space-y-1 text-gray-500 leading-loose">
                                <div>Username</div>
                                <div class="font-medium text-gray-900">{{ $result['data']['username'] }}</div>
                                <div>Negara Akun dibuat</div>
                                <div class="font-medium text-gray-900">{{ $result['data']['create_role_country'] }}</div>
                                <div>Negara Terakhir Login</div>
                                <div class="font-medium text-gray-900">{{ $result['data']['this_login_country'] }}</div>
                                <div>Tanggal Pembuatan Akun</div>
                                <div class="font-medium text-gray-900">{{ $result['data']['user_reg_time'] }}</div>
                                <div>Usia Akun</div>
                                <div class="font-medium text-gray-900">{{ $result['data']['user_reg_time_human'] }}</div>
                            </div>
                            
                            <button onclick="copyToClipboard('#contact-details')" class="absolute right-2 top-2 text-gray-500 hover:bg-gray-100 rounded-lg p-2 inline-flex items-center justify-center">
                                <span id="default-icon-contact-details">
                                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                        <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z"/>
                                    </svg>
                                </span>
                                <span id="success-icon-contact-details" class="hidden inline-flex items-center">
                                    <svg class="w-3.5 h-3.5 text-blue-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                    </svg>
                                </span>
                            </button>
                        </address>
                    </div>
                @else
                    <p class="text-red-500 mt-3">{{ $result['errors'] }}</p>
                @endif
                
                <div id="toast-success" class="fixed bottom-5 right-5 flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow-lg" role="alert" style="display: none;">
                    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.707a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Check icon</span>
                    </div>
                    <div class="ml-3 text-sm font-normal">Teks berhasil disalin ke clipboard.</div>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8" aria-label="Close" onclick="closeToast()">
                        <span class="sr-only">Close</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 9.293a1 1 0 011.414 0L9 12.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-2-2a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            @endif

            <p class="text-center text-sm text-gray-500 mt-4">
                &copy; {{ date('Y') }} <a class="hover:text-blue-800" href="https://facebook.com/hyfan.gt">Rangga Casper</a>. All rights reserved.
            </p>
        </div>
    </section>
</div>

@push('scripts')
<script>
    function copyToClipboard(elementSelector) {
        const element = document.querySelector(elementSelector);
        const tempInput = document.createElement('textarea');
        tempInput.value = element.innerText.trim();
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);

        showToast();
    }

    function showToast() {
        const toast = document.getElementById('toast-success');
        toast.style.display = 'flex';
        setTimeout(() => {
            toast.style.display = 'none';
        }, 3000);
    }

    function closeToast() {
        const toast = document.getElementById('toast-success');
        toast.style.display = 'none';
    }
</script>
@endpush
