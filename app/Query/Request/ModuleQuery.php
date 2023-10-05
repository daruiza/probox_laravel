<?php

namespace App\Query\Request;

use Illuminate\Support\Facades\DB;
use App\Model\Core\Module;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Query\Abstraction\IModuleQuery;
use Carbon\Carbon;

class ModuleQuery implements IModuleQuery
{
    private $name   = 'name';
    private $description = 'description';
    private $label  = 'label';
    private $active  = 'active';


    // retorna todos los colaboradores de un comercio
    // además de los datos de el último reporte en el que
    // cada colaborador aparece
    public function index(Request $request)
    {
       
    }

    public function store(Request $request)
    {
        
    }

    public function update(Request $request, int $id)
    {
        
    }

    public function destroy(int $id)
    {
        
    }

    public function showByModuleId(Request $request, int $id)
    {
        
    }
}
