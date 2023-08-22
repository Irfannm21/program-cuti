<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRoleRequest;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Permission;
use App\Role;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\cv;
use Faker\Factory as Faker;
use Carbon\Carbon;
class RolesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cv = cv::select("id","nik","tanggal_lahir")->get();
        
        $faker = Faker::create("id_ID");
        $result = $faker->randomElement($cv);
        // Faker untuk membedakan gender
        $jabatan = $faker->randomElement(["Operator","Staff","Administratasi","Karu","Kasie"]);
        
        $carbon1 = new Carbon();
        // foreach($cv as $val) {
            $today = carbon::create($result->tanggal_lahir);
            $kerja = $faker->dateTimeBetween($today,'+ 19 years')->format('Y-m-d');
            $mulai = $faker->dateTimeBetween($kerja,'+ 10 years')->format('Y-m-d');
            $stop = $faker->dateTimeBetween($mulai,'+ 40 years')->format('Y-m-d');
            // dd($faker->dateTimeInInterval($today,"+ 29 Years")->format('Y-m-d'));
            
            echo " | " . $faker->company;
            echo " | " .$jabatan;
            echo " | " .$faker->city;
            echo " | " .$faker->randomNumber(7);
            echo " | " .$mulai;
            echo " | " .$stop;
            echo " | " .$faker->sentence(5);
            echo " | " .$result->nik."_Vaklaring.pdf";
            
           
            echo "<br>";
        // }
        
        // $roles = Role::all();

        // return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::all()->pluck('title', 'id');

        return view('admin.roles.create', compact('permissions'));
    }

    public function store(StoreRoleRequest $request)
    {
        $role = Role::create($request->all());
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('admin.roles.index');

    }

    public function edit(Role $role)
    {
        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::all()->pluck('title', 'id');

        $role->load('permissions');

        return view('admin.roles.edit', compact('permissions', 'role'));
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->all());
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('admin.roles.index');

    }

    public function show(Role $role)
    {
        abort_if(Gate::denies('role_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->load('permissions');

        return view('admin.roles.show', compact('role'));
    }

    public function destroy(Role $role)
    {
        abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->delete();

        return back();

    }

    public function massDestroy(MassDestroyRoleRequest $request)
    {
        Role::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
