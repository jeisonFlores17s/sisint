<?php

namespace App\Http\Livewire\Portafolio;

use Livewire\Component;
use App\Models\Contacto;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Indexportafolio extends Component
{

    public $nombre, $correo, $asunto, $descripcion;

    use LivewireAlert;

    public function render()
    {
        return view('livewire.portafolio.indexportafolio');
    }

    public function resetInputFields()
    {
        $nombre = "";
        $correo = "";
        $asunto = "";
        $descripcion = "";
    }

    public function enviarcontacto()
    {
        $validateDate = $this->validate([
        'nombre' => 'required',
        'correo' => 'required|email',
        'asunto' => 'required',
        'descripcion' => 'required',
        ]);

        $enviarcontacto = Contacto::create($validateDate);
        $this->resetInputFields();
        $this->alert('success', 'Enviado!', [
         'position' => 'bottom-endt',
         'timer' => 3000,
         'toast' => true,
    ]);
    }
}
