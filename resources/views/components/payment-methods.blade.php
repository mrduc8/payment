<div class="w-full space-y-2">
    {{-- display payment --}}
    <div class="flex justify-center items-center text-center">
        <div class="order-container" id="order-container">
            {{-- @livewire('order-component') --}}
        </div>
        <hr>        
    </div>
    {{-- payment methods --}}
    <div class="flex justify-between items-center">
        <h4 class="font-bold text-sm text-gray-700">Phương thức thanh toán</h4>
        <a href="#" class="text-red-500 text-sm">Xem tất cả ></a>
    </div>
    <label class="flex items-center justify-between cursor-pointer w-full p-3 border border-gray-300 rounded-lg shadow-md hover:border-blue-400 transition">
        <div class="flex items-center gap-5">
            <img src="assets/image/itemicon/AppotaWallet_ngang.svg" class="w-6 h-6 object-contain">
            <span class="ml-3 text-gray-500 text-sm">AppotaPay</span>
        </div>
        <input type="radio" name="payment-method" value="appotapay">
    </label>    

    <label class="flex items-center justify-between cursor-pointer w-full p-3 border border-gray-300 rounded-lg shadow-md hover:border-blue-400 transition">
        <div class="flex items-center gap-5">
            <img src="/assets/image/iconbank.png" class="w-6 h-6 object-contain">
            <span class="ml-3 text-gray-500 text-sm">Thẻ ATM</span>
        </div>
        <input type="radio" name="payment-method" value="atm">
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        displaySelectedPackage();
    });

    function displaySelectedPackage() {
        const packageInfo = JSON.parse(localStorage.getItem('selectedPackage'));
        const container = document.getElementById('order-container');
        const totalAmountElement = document.getElementById('total-amount');
        const totalPaymentElement = document.getElementById('total-payment');
        const payButton = document.getElementById('pay-button');

        // Reset giá trị mặc định
        container.innerHTML = '';
        totalAmountElement.textContent = '0 VND';
        totalPaymentElement.textContent = '0 VND';
        payButton.disabled = true; 
        payButton.classList.add('bg-gray-300', 'text-gray-500', 'cursor-not-allowed');
        payButton.classList.remove('bg-red-500', 'hover:bg-red-700', 'text-white');

        // Nếu không có gói nào, hiển thị "Đơn hàng này đang trống"
        if (!packageInfo) {
            container.innerHTML = `
                <div class="text-center text-gray-500 text-sm p-4 border-gray-300 rounded-lg">
                    Đơn hàng này đang trống
                </div>
            `;
            return;
        }

        // Định dạng số có dấu phẩy
        const formattedAmount = Number(packageInfo.amount).toLocaleString('vi-VN');
        const formattedKbn = Number(packageInfo.knb).toLocaleString('vi-VN');

        // Cập nhật tổng tiền
        totalAmountElement.textContent = `${formattedAmount} VND`;
        totalPaymentElement.textContent = `${formattedAmount} VND`;

        // Kích hoạt nút thanh toán
        payButton.disabled = false;
        payButton.classList.remove('bg-gray-300', 'text-gray-500', 'cursor-not-allowed');
        payButton.classList.add('bg-red-500', 'hover:bg-red-700', 'text-white');

        // Hiển thị gói đã chọn
        container.innerHTML = `
            <div class="relative  w-48 h-40 p-2 rounded-lg border shadow bg-white cursor-pointer">
                <img src="assets/image/itemicon/iconbackgrao.png" class="absolute inset-0 w-full h-full object-cover opacity-10">
                <img src="assets/image/itemicon/iconkhungblu.png" class="absolute inset-0 w-full h-full">
                <div class="relative flex flex-col items-center text-center">
                    <img src="assets/image/itemicon/iconmain.png" class="w-14 h-14">
                    <div class="relative w-full flex justify-center items-center mt-2">
                        <img src="assets/image/itemicon/iconbn1.png" class="w-full">
                        <span class="absolute font-bold text-[10px]">
                            ${formattedKbn  } <span class="text-red-500">KBN</span> + ${packageInfo.bonus_percent}% <span class="text-red-500">Bonus</span>
                        </span>
                    </div>
                    <div class="w-full flex justify-between items-center mt-3 px-2">
                        <p class="font-bold text-xs">Gói ${formattedAmount} VND</p>
                        <button class="p-1 bg-red-500 rounded-md hover:bg-red-700 flex items-center justify-center w-5 h-5"
                            onclick="removeSelectedPackage()">
                            <img src="assets/image/itemicon/iconx.png" class="w-full h-full">
                        </button>
                    </div>
                </div>
            </div>
        `;
    }

    function removeSelectedPackage() {
        localStorage.removeItem('selectedPackage');
        displaySelectedPackage();
    }
</script>
