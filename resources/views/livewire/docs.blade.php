<div class="container mx-auto">
    <h4 class="text-2xl font-semibold mb-4">API CEK TANGGAL PEMBUATAN AKUN (V1)</h4>
    <section class="bg-white shadow-md rounded-lg p-6 mb-6">
        <h4 class="text-xl font-semibold mb-4">Request</h4>
        <div class="mb-4 border-b border-gray-200">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="endpoint-tab" data-tabs-target="#endpoint" type="button" role="tab" aria-controls="endpoint" aria-selected="false">Endpoint</button>
                </li>
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300" id="parameter-tab" data-tabs-target="#parameter" type="button" role="tab" aria-controls="parameter" aria-selected="false">Parameter</button>
                </li>
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300" id="request-tab" data-tabs-target="#request" type="button" role="tab" aria-controls="request" aria-selected="false">Contoh Request</button>
                </li>
            </ul>
        </div>
        <div id="default-tab-content">
            <div class="hidden p-4 rounded-lg bg-gray-50" id="endpoint" role="tabpanel" aria-labelledby="endpoint-tab">
                <h5 class="text-lg font-semibold mb-2">Endpoint</h5>
                <p class="text-sm font-mono bg-gray-100 p-4 rounded-lg border border-gray-300 overflow-x-auto whitespace-nowrap">{{ env('APP_URL') }}/api/v1/check?userId=[YOUR_USER_ID]&zoneId=[YOUR_ZONE_ID]</p>
                <h5 class="text-lg font-semibold mt-4 mb-2">Method</h5>
                <span class="text-xs font-medium me-2 px-4 py-2 rounded-full bg-blue-600 text-white">GET</span>
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50" id="parameter" role="tabpanel" aria-labelledby="parameter-tab">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Parameter</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Contoh</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Tipe</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Wajib</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">userId</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">334050355</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">Numeric</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">Ya</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">User ID. Panjang: 6-10 digit.</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">zoneId</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">9266</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">Numeric</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">Ya</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">Zone ID. Panjang: 4-5 digit.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50" id="request" role="tabpanel" aria-labelledby="request-tab">
                <p class="text-sm font-mono bg-gray-100 p-4 rounded-lg border border-gray-300 overflow-x-auto whitespace-nowrap">{{ env('APP_URL') }}/api/v1/check?userId=334050355&zoneId=9266</p>
            </div>
        </div>
    </section>    
    
    <section class="bg-white shadow-md rounded-lg p-6 mb-6">
        <div>
            <h4 class="text-xl font-semibold mb-4">Response</h4>
            <h5 class="font-semibold">Success (200 OK)</h5>
            <p class="mb-2">Contoh Response Sukses :</p>
            <div class="overflow-x-auto">
            <pre class="text-sm bg-gray-900 rounded-lg"><code>
    <span class="text-white">{
        "status":</span> <span class="text-blue-600">true</span><span class="text-white">,</span>
        <span class="text-white">"data":</span> <span class="text-white">{</span>
            <span class="text-white">"create_role_country":</span> <span class="text-green-400">"Indonesia",</span>
            <span class="text-white">"this_login_country":</span> <span class="text-green-400">"Indonesia",</span>
            <span class="text-white">"user_reg_time":</span> <span class="text-green-400">"2018-12-02 04:56:29 WIB",</span>
            <span class="text-white">"user_reg_time_human":</span> <span class="text-green-400">"5 tahun 9 bulan 1 minggu 1 hari 12 jam 35 menit",</span>
            <span class="text-white">"username":</span> <span class="text-green-400">"RaCasツ"</span>
        <span class="text-white">},</span>
    <span class="text-white">}
        </span></code></pre>
            </div>
        </div>

        <div>
            <h5 class="font-semibold mt-3">Error (400 Bad Request)</h5>
            <p class="mb-2">Contoh Response Error :</p>
            <div class="overflow-x-auto">
            <pre class="text-sm bg-gray-900 rounded-lg"><code>
    <span class="text-white">{
        "status":</span> <span class="text-blue-600">false</span><span class="text-white">,</span>        
        <span class="text-white">"errors":</span> <span class="text-green-400">"Error: Unexpected response from server."</span>
    <span class="text-white">}
        </span></code></pre>
            </div>
        </div>
    </section>

    <h4 class="text-2xl font-semibold mb-4">API CEK NEGARA AKUN DIBUAT (V2)</h4>
    <section class="bg-white shadow-md rounded-lg p-6 mb-6">
        <h4 class="text-xl font-semibold mb-4">Request</h4>
        <div class="mb-4 border-b border-gray-200">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="endpoint-2-tab" data-tabs-target="#endpoint-2" type="button" role="tab" aria-controls="endpoint-2" aria-selected="false">Endpoint</button>
                </li>
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300" id="parameter-2-tab" data-tabs-target="#parameter-2" type="button" role="tab" aria-controls="parameter-2" aria-selected="false">Parameter</button>
                </li>
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300" id="request-2-tab" data-tabs-target="#request-2" type="button" role="tab" aria-controls="request-2" aria-selected="false">Contoh Request</button>
                </li>
            </ul>
        </div>
        <div id="default-tab-content">
            <div class="hidden p-4 rounded-lg bg-gray-50" id="endpoint-2" role="tabpanel" aria-labelledby="endpoint-2-tab">
                <h5 class="text-lg font-semibold mb-2">Endpoint</h5>
                <p class="text-sm font-mono bg-gray-100 p-4 rounded-lg border border-gray-300 overflow-x-auto whitespace-nowrap">{{ env('APP_URL') }}/api/v2/check?userId=[YOUR_USER_ID]&zoneId=[YOUR_ZONE_ID]</p>
                <h5 class="text-lg font-semibold mt-4 mb-2">Method</h5>
                <span class="text-xs font-medium me-2 px-4 py-2 rounded-full bg-blue-600 text-white">GET</span>
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50" id="parameter-2" role="tabpanel" aria-labelledby="parameter-2-tab">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Parameter</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Contoh</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Tipe</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Wajib</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">userId</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">334050355</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">Numeric</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">Ya</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">User ID. Panjang: 6-10 digit.</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">zoneId</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">9266</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">Numeric</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">Ya</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">Zone ID. Panjang: 4-5 digit.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50" id="request-2" role="tabpanel" aria-labelledby="request-2-tab">
                <p class="text-sm font-mono bg-gray-100 p-4 rounded-lg border border-gray-300 overflow-x-auto whitespace-nowrap">{{ env('APP_URL') }}/api/v2/check?userId=334050355&zoneId=9266</p>
            </div>
        </div>
    </section>    
    
    <section class="bg-white shadow-md rounded-lg p-6 mb-6">
        <div>
            <h4 class="text-xl font-semibold mb-4">Response</h4>
            <h5 class="font-semibold">Success (200 OK)</h5>
            <p class="mb-2">Contoh Response Sukses :</p>
            <div class="overflow-x-auto">
            <pre class="text-sm bg-gray-900 rounded-lg"><code>
    <span class="text-white">{
        "status":</span> <span class="text-blue-600">true</span><span class="text-white">,</span>
        <span class="text-white">"data":</span> <span class="text-white">{</span>
            <span class="text-white">"create_role_country":</span> <span class="text-green-400">"Indonesia",</span>
            <span class="text-white">"username":</span> <span class="text-green-400">"RaCasツ"</span>
        <span class="text-white">},</span>
    <span class="text-white">}
        </span></code></pre>
            </div>
        </div>

        <div>
            <h5 class="font-semibold mt-3">Error (400 Bad Request)</h5>
            <p class="mb-2">Contoh Response Error :</p>
            <div class="overflow-x-auto">
            <pre class="text-sm bg-gray-900 rounded-lg"><code>
    <span class="text-white">{
        "status":</span> <span class="text-blue-600">false</span><span class="text-white">,</span>        
        <span class="text-white">"errors":</span> <span class="text-green-400">"Error: Unexpected response from server."</span>
    <span class="text-white">}
        </span></code></pre>
            </div>
        </div>
    </section>
</div>

@push('footer')
<x-footer />
@endpush