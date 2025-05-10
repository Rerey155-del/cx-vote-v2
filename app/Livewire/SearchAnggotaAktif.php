<?php

namespace App\Livewire;


use App\Models\User;
use Livewire\Component;

class SearchAnggotaAktif extends Component
{
    public $search = '';

    public function render()
    {
        $hak_suaras = User::where('role', false)
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('kode_cx', 'like', '%' . $this->search . '%');
            })
            ->orderBy('kode_cx', 'asc')
            ->get();

        return view('livewire.search-anggota-aktif', [
            'hak_suaras' => $hak_suaras,
        ]);
    }
}
