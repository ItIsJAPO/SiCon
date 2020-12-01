<?php

namespace App\Http\Livewire;

use App\Models\TypeDevice;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class TypeDeviceTable extends Component
{
    use WithPagination;

    public $search = "";
    public $perPage = 5;

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
        'perPage' => ['except' => 5],
    ];

    public function render()
    {
        return view(
            'livewire.type-device-table',
            [
                'type_devices' => TypeDevice::where('nombre', 'LIKE', "%{$this->search}%")->paginate($this->perPage)
            ]
        );
    }

    public function clear()
    {
        $this->search = "";
        $this->page = 1;
        $this->perPage = '5';
    }
}
