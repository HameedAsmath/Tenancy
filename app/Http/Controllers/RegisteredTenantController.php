<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterTenantRequest;
use App\Models\Tenant;



class RegisteredTenantController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(RegisterTenantRequest $request){

        
         $tenant = Tenant::create($request -> validated());
         $id = str_replace(' ', '',$request->id);
         $tenant->createDomain([
            'domain' => $id.'.localhost'
          ]);
        return redirect(tenant_route($tenant->domains->first()->domain,'tenant.login'));  
        


     

    }
}
