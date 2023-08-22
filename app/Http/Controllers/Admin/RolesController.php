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
        // Faker untuk membedakan gender
        $sekolah = ["SD","SMP","SMA"];
        
        $carbon1 = new Carbon();
        foreach($cv as $val) {
            $today = carbon::create($val->tanggal_lahir);

            // dd($faker->dateTimeInInterval($today,"+ 29 Years")->format('Y-m-d'));
            echo " | " . $sekolah[0];
            echo " | " .$faker->streetName;
            echo " | " .$faker->city;
            echo " | " .$faker->dateTimeInInterval($today,'+ 7 years')->format('Y-m-d');
            echo " | " .$faker->dateTimeInInterval($today,'+ 13 years')->format('Y-m-d');
            echo " | " . $faker->numberBetween(70,100);
            echo " | " . $val->nik . "_resume.pdf";
           
            echo "<br>";
        }
        for($i=0; $i<=10; $i++) {
                
                    // echo " | " .$sekolah[0];
                    // echo " | " .$faker->streetName;
                    // echo " | " .$faker->city;
                    // // echo " | " ."Islam";
                    // // echo " | " .$faker->city;
                    // echo " | " .$faker->dateTimeBetween('1960-01-01','2000-01-31');
                    // // echo " | " ."Menikah";
                    // // echo " | " .$faker->state;
                    // // echo " | " .$faker->city;
                    // // echo " | " .$faker->buildingNumber;
                    // // echo " | " .$faker->address;
                    // // echo " | " .$faker->phoneNumber;
                    // // echo " | " .$faker->email;
                    // // echo " | " .$faker->postcode;
                    // echo "<br>";
                
                }
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
