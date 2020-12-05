<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ResguardosEmpleadosTable extends Component
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
            'livewire.users-table',
            [
                'usuarios' => User::where('name', 'LIKE', "%{$this->search}%")->where('id','<>',Auth::user()->id)->paginate($this->perPage)
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
