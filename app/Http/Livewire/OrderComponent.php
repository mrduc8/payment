<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Log;

class OrderComponent extends Component
{
    public $selectedOrder = null;

    // Lắng nghe sự kiện từ Blade
    protected $listeners = ['addOrder'];

    public function addOrder($package)
    {
        $this->selectedOrder = $package;
    }

    public function render()
    {
        return view('livewire.order-component', [
            'selectedOrder' => $this->selectedOrder,
        ]);
    }
}


