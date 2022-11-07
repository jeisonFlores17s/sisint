<?php

namespace App\Http\Livewire\Responsable;

use Livewire\Component;
use App\Models\Responsable;
use App\Models\Area;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Providers\RouteServiceProvider;
use App\Exports\ResponsableExport;
use App\Exports\responsable\ResponsableTodosExport;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{
    //public $users;
    public  $name, $password, $rol, $email, $password_confirmation, $area_id;
    public $updateMode = false;
    protected $paginationTheme = 'bootstrap';
    public $foo;
    public $search = '';
    public $page = 1;

    protected $queryString = [
        'foo',
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    use LivewireAlert;
    use WithPagination;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        $users = DB::table('users')
        ->join('areas', 'areas.id', '=', 'users.area_id')
        ->select('areas.area', 'users.name', 'users.email', 'users.id', 'users.rol')
        ->where('name', 'like', '%'.$this->search.'%')
        ->orwhere('area', 'like', '%'.$this->search.'%')
        ->orwhere('email', 'like', '%'.$this->search.'%')
        ->paginate(3);

        $areas = DB::table('areas')
        ->select('id', 'area',)
        ->get();
        return view('livewire.responsable.index',[
          //  'responsables' => $responsables,
            'users' => $users,
            'areas' => $areas,

        ]);
    }

    public function resetInputFields()
    {
        $this->name = "";
        $this->email = "";
        $this->password = "";
        $this->rol = "";
        $this->password_confirmation = "";
        $this->area_id = "";
    }

    public function crearUser()
    {
       $validatedDate = $this->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'rol' => 'required',
        'area_id' => 'required',
    ]);

       if($validatedDate){
        $insertValidate = [
            'name' => $validatedDate['name'],
            'rol' => $validatedDate['rol'],
            'email' => $validatedDate['email'],
            'area_id' => $validatedDate['area_id'],
            'password' => Hash::make($validatedDate['password']),
        ];

        $crearusuario = User::create($insertValidate);
        $obtenernombreusuario = $crearusuario->name;
    }
    $this->alert('success','Usuario creado corrrectamente!', [
       'position' => 'top-start',
       'timer' => 3000,
       'toast' => true,
   ]);
    $this->emit('crearuser');
    $this->resetInputFields();
}

public function editarUser($id)
{
    $editarusuario  = User::find($id);
    $this->user_id = $id;
    $this->area_id = $editarusuario->area_id;
    $this->rol = $editarusuario->rol;
    $this->updateMode = false;
}

public function cancelarUser()
{
    $this->updateMode = true;
    $this->resetInputFields();
}

public function actualizarUser()
{
    $validatedDate = $this->validate([
        'rol' => 'required',
        'area_id' => 'required',
    ]);

    if($validatedDate){
        $insertValidate = [
            'area_id' => $validatedDate['area_id'],
            'rol' => $validatedDate['rol'],

        ];

        $editarusuario = User::find($this->user_id);
        $editarusuario->update($insertValidate);
        $this->updateMode = false;

        $this->emit('crearuser');
        $this->resetInputFields();
        $this->alert('success', 'Usuario Actualizado!', [
         'position' => 'top-start',
         'timer' => 3000,
         'toast' => true,
     ]);
    }
}

public function eliminarUser($id)
{
    $eliminarusuario = User::find($id)->delete();
    $this->alert('info', 'Usuario Eliminado!', [
       'position' => 'top-start',
       'timer' => 3000,
       'toast' => true,
   ]);
}

public function ResponsableExport()
{

    return (new ResponsableExport())->download('areas.xlsx');
}

public function ResponsableTodosExport()
{

    return Excel::download(new ResponsableTodosExport, 'todos_responsables.xlsx');
}

} 