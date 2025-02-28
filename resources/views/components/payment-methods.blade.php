
<div class="w-full space-y-2">
    {{-- display payment --}}
    <div class="flex justify-center items-center text-center">
        <div class="order-container">
            @livewire('order-component')  <!-- Chèn Livewire Component -->
        </div>        
    </div>
    {{-- payment methods --}}
    <div class="flex justify-between items-center">
        <h4 class="font-bold text-sm text-gray-700">Phương thức thanh toán</h4>
        <a href="#" class="text-red-500 text-sm">Xem tất cả ></a>
    </div>
    <label class="flex items-center justify-between cursor-pointer w-full p-3 border border-gray-300 rounded-lg shadow-md hover:border-blue-400 transition">
        <div class="flex items-center gap-5">
            <img src="/assets/image/LogoZalo.png" class="w-6 h-6 object-contain">
            <span class="ml-3 text-gray-500 text-sm">AppotaPay</span>
        </div>
        <input type="radio" name="payment-method" value="zalopay">
    </label>    

    <label class="flex items-center justify-between cursor-pointer w-full p-3 border border-gray-300 rounded-lg shadow-md hover:border-blue-400 transition">
        <div class="flex items-center gap-5">
            <img src="/assets/image/iconbank.png" class="w-6 h-6 object-contain">
            <span class="ml-3 text-gray-500 text-sm">Thẻ ATM</span>
        </div>
        <input type="radio" name="payment-method" value="zalopay">
    </label>
    {{-- payment detail --}}
    <div class="mt-4">
        <h4 class="font-bold text-sm text-gray-700">Chi tiết thanh toán</h4>
        <div class="bg-gray-300 border p-3 rounded-md mt-2 flex justify-between shadow">
            <span class="text-md text-gray-600">Tổng tiền:</span>
            <span class="font-medium text-gray-800 text-md" id="total-amount">0 VND</span>
        </div>
    </div>
</div>
