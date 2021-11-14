<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;

    // laravel is using tailwind, so we have to use
    // this variable to show bootstrap
    protected $paginationTheme = "bootstrap";

    public $search;

    public function render()
    {
        $users = User::where('name', 'LIKE', '%'.$this->search.'%')
            ->orwhere('email', 'LIKE', '%'.$this->search.'%')
            ->paginate(8);

        return view('livewire.admin.users-index', compact('users'));
    }

    public function cleanPage()
    {
        $this->reset('page');
    }
}
