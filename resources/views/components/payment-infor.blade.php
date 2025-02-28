<div>
    <form id="payment-form">
        <!-- Form nhập thông tin -->
        <div class="rounded-md bg-white ">
            <h4 class="font-bold text-sm mb-2">Nạp cho tài khoản</h4>
            <input type="text" class="w-full border p-2 rounded-md text-sm shadow" placeholder="Nhập tài khoản">
        
            <h4 class="font-bold text-sm mt-4 pb-2">Họ và tên *</h4>
            <input type="text" class="w-full border p-2 rounded-md text-sm shadow" placeholder="Nhập họ và tên">
        
            <!-- Chọn game nạp -->
            <h4 class="font-bold text-sm mt-4 pb-2">Chọn game nạp</h4>
            <select class="w-full border p-2 rounded-md appearance-none text-sm">
                <option value="swordsman">Swordsman Online</option>
                <option value="pubg">PUBG Mobile</option>
                <option value="lol">Liên Minh Huyền Thoại</option>
                <option value="genshin">Genshin Impact</option>
            </select>
        
            <!-- Chọn máy chủ -->
            <h4 class="font-bold text-sm mt-4 pb-2">Chọn máy chủ</h4>
            <select class="w-full border p-2 rounded-md appearance-none text-sm ">
                <option value="server1">Server 1</option>
                <option value="server2">Server 2</option>
                <option value="server3">Server 3</option>
            </select>
        </div>
    </form>

<div x-data="{ showModal: false, selectedPackage: null}" class="pt-4">
    <h4 class="font-bold text-sm mb-3">Chọn gói nạp</h4>
    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 gap-6"> <!-- Tăng gap để tạo khoảng cách -->
        @foreach ($packages as $package)
        <div class="relative w-48 h-40 p-2 rounded-lg border shadow bg-white cursor-pointer hover:border-blue-500"
           @click="showModal = true; selectedPackage = {{ json_encode($package) }}"  >

            <!-- Background coins -->
            <img src="assets/image/itemicon/iconbackgrao.png" class="absolute inset-0 w-full h-full object-cover opacity-10" alt="Background Coins">
    
            <!-- Border Frame -->
            <img src="assets/image/itemicon/iconkhungblu.png" class="absolute inset-0 w-full h-full" alt="Frame">
    
            <!-- Content -->
            <div class="relative flex flex-col items-center text-center">
                <!-- Money Bag Icon -->
                <img src="assets/image/itemicon/iconmain.png" class="w-14 h-14" alt="Money Bag">
    
                <!-- Bonus Information -->
                <div class="relative w-full flex justify-center items-center mt-2">
                    <img src="assets/image/itemicon/imgbn.png" class="w-full" alt="Bonus Background">
                    <span class="absolute font-bold text-[10px]">
                        {{ number_format($package['knb']) }} <span class="text-red-500">KBN</span> + {{ number_format($package['bonus_percent']) }} %<span class="text-red-500">Bonus</span>
                    </span>
                </div>
    
                <!-- Price & Add Button -->
                <div class="w-full flex justify-between items-center mt-3 px-2">
                    <p class="font-bold text-xs">Gói {{ number_format($package['amount']) }} VND</p>
                    <button wire:click="$emit('addOrder', {{ json_encode($package) }})" class="p-1 bg-blue-500 rounded-md hover:bg-blue-700 flex items-center justify-center w-5 h-5"
                    @click.stop="$wire.emit('addOrder', {{ json_encode($package) }})"  >
                        <img src="assets/image/itemicon/iconcong.png" class="w-3 h-3" alt="Plus Icon">
                    </button>
                </div>
            </div>
        </div>
    @endforeach
    </div>

    <!-- Popup Chi Tiết -->
    <div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg w-96 p-4">
            <!-- Header -->
            <div class="flex justify-between items-center border-b pb-2">
                <h2 class="text-lg font-semibold">Chi tiết gói</h2>
                <button @click="showModal = false" class="text-gray-500 hover:text-gray-800">&times;</button>
            </div>

            <!-- Nội dung -->
            <div class="mt-4">
                <div class="flex items-center gap-4">
                    <!-- Item thu nhỏ -->
                    <div class="relative w-24 h-20 p-2 rounded-lg border shadow bg-white">
                        <!-- Background -->
                        <img src="assets/image/itemicon/iconbackgrao.png" class="absolute inset-0 w-full h-full object-cover opacity-10" alt="Background Coins">
                        <!-- Border Frame -->
                        <img src="assets/image/itemicon/iconkhungblu.png" class="absolute inset-0 w-full h-full" alt="Frame">
                        <!-- Nội dung -->
                        <div class="relative flex flex-col items-center text-center">
                            <img src="assets/image/itemicon/iconmain.png" class="w-8 h-8" alt="Money Bag">
                            <div class="relative w-full flex justify-center items-center mt-1">
                                <img src="assets/image/itemicon/imgbn.png" class="w-full" alt="Bonus Background">
                                <span class="absolute font-bold text-[4px]">
                                    <span x-text="selectedPackage ? new Intl.NumberFormat().format(selectedPackage.knb) : ''"></span> 
                                    <span class="text-red-500">KBN</span> + 
                                    <span x-text="selectedPackage ? new Intl.NumberFormat().format(selectedPackage.bonus_knb) : ''"></span> 
                                    <span class="text-red-500">Bonus</span>
                                </span>
                            </div>
                            <p class="font-bold text-[5px] mt-1">
                                Gói <span x-text="selectedPackage ? new Intl.NumberFormat().format(selectedPackage.amount) : ''"></span> VND
                            </p>
                            
                        </div>
        
                    </div>
                
                    <!-- Thông tin gói -->
                    <p class="text-blue-600 font-semibold text-lg">
                        Gói <span x-text="selectedPackage ? new Intl.NumberFormat().format(selectedPackage.amount) : ''"></span> VND
                    </p>
                </div>
                

                <!-- Số lượng -->
                <div class="flex justify-between items-center mt-4 border-t pt-2">
                    <span class="font-semibold">Số lượng</span>
                    <span class="bg-gray-200 px-2 py-1 rounded">x1</span>
                </div>

                <!-- Thành tiền -->
                <div class="grid grid-cols-2 items-center mt-4">
                    <!-- Cột 1: Thành tiền + Giá -->
                    <div class="flex flex-col">
                        <p class="text-sm font-normal text-gray-300">Thành tiền</p>
                        <span class="text-red-500 text-sm">
                            <span x-text="selectedPackage ? new Intl.NumberFormat().format(selectedPackage.amount) : ''"></span> VND
                        </span>
                    </div>
                    
                    <!-- Cột 2: Nút thêm vào giỏ hàng -->
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                        Thêm vào giỏ hàng
                    </button>
                </div>
                
            </div>
        </div>
    </div>
</div>
 
</div>
