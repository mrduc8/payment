<div>
    <pre>{{ var_export($selectedPackage, true) }}</pre>
    @if ($selectedPackage)
        <!-- Nếu có gói đã chọn, hiển thị chi tiết -->
        <div class="rounded bg-gray-100">
            <div class="flex items-center">
                <!-- Item thu nhỏ -->
                <div class="relative w-24 h-20 p-2 rounded-lg border shadow bg-white">
                    <img src="{{ asset('assets/image/itemicon/iconbackgrao.png') }}" 
                         class="absolute inset-0 w-full h-full object-cover opacity-10">
                    <img src="{{ asset('assets/image/itemicon/iconkhungblu.png') }}" 
                         class="absolute inset-0 w-full h-full">
                    <div class="relative flex flex-col items-center text-center">
                        <img src="{{ asset('assets/image/itemicon/iconmain.png') }}" class="w-8 h-8">
                        <div class="relative w-full flex justify-center items-center mt-1">
                            <img src="{{ asset('assets/image/itemicon/iconbn1.png') }}" class="w-full">
                            <span class="absolute font-bold text-[4px]">
                                <span>{{ number_format($selectedPackage['knb'] ?? 0) }}</span> 
                                <span class="text-red-500">KBN</span> + 
                                <span>{{ $selectedPackage['bonus_percent'] ?? 0 }}%</span>  
                                <span class="text-red-500">Bonus</span>
                            </span>
                        </div>
                        <p class="font-bold text-[5px] mt-1">
                            Gói {{ number_format($selectedPackage['amount'] ?? 0) }} VND
                        </p>
                    </div>
                </div>

                <!-- Thông tin gói -->
                <div>
                    <p class="text-blue-600 font-semibold text-lg">
                        Gói {{ number_format($selectedPackage['amount'] ?? 0) }} VND
                    </p>
                    <span class="font-bold text-sm">
                        <span>{{ number_format($selectedPackage['knb'] ?? 0) }}</span> 
                        <span class="text-red-500">KBN</span> + 
                        <span>{{ $selectedPackage['bonus_percent'] ?? 0 }}%</span>
                        <span class="text-red-500">Bonus</span>
                    </span>
                    <p class="font-semibold text-sm">
                        Nhận về: 
                        <span class="font-semibold">
                            {{ number_format(($selectedPackage['knb'] ?? 0) + (($selectedPackage['knb'] ?? 0) * ($selectedPackage['bonus_percent'] ?? 0) / 100)) }}
                        </span> 
                        <span class="font-bold text-red-500">KBN</span> 
                    </p>
                </div>
            </div>
        </div>
    @else
        <!-- Nếu chưa có gói nào, hiển thị thông báo -->
        <p class="text-gray-500 text-sm">Đơn hàng này đang trống</p>
    @endif
</div>
