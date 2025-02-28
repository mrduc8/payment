<div class="p-4 rounded">
    @if (!empty($selectedOrder))
        <div class="border p-2 rounded bg-gray-100">
            <p><strong>Tên sản phẩm:</strong> {{ $selectedOrder['name'] }}</p>
            <p><strong>Giá:</strong> {{ number_format($selectedOrder['amount']) }} VND</p>
        </div>
    @else
        <p class="text-gray-500 text-sm">Đơn hàng này đang trống </p>
    @endif
</div>
