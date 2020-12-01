<?php

namespace App\Http\Livewire;

use App\Models\TypeDevice;
use App\Models\UnidadAdministrativa;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AdministrativeUnitTable extends Component
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
            'livewire.administrative-unit-table',
            [
                'administrative_units' => UnidadAdministrativa::where('nombre', 'LIKE', "%{$this->search}%")->paginate($this->perPage)
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
