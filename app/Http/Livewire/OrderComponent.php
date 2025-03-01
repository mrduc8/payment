<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Log;

class OrderComponent extends Component
{
    public $selectedPackage = []; // Lưu gói đã chọn

    protected $listeners = ['addOrder' => 'handleAddOrder'];

    public function handleAddOrder($package)
    {
        Log::info('Gói đã chọn:', ['package' => $package]);

        if (!is_array($package)) {
            $package = json_decode($package, true);
        }

        $this->selectedPackage = $package; // Cập nhật dữ liệu
    }

    public function render()
    {
        return view('livewire.order-component', [
            'selectedPackage' => $this->selectedPackage,
        ]);
    }
}
