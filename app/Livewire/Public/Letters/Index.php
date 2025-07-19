<?php

namespace App\Livewire\Public\Letters;

use App\Models\Letter\LetterType;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Surat Desa')]
#[Layout('layouts.guest')]
class Index extends Component
{
    public $letterTypes;

    public function mount()
    {
        $this->letterTypes = LetterType::with(['requiredDocumentTypes'])
            ->orderBy('letter_name')
            ->get();
    }

    public function render()
    {
        return view('livewire.public.letters.index');
    }
}
