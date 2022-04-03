<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permission list*
        Permission::create(['name' => 'permissions.index']);
        Permission::create(['name' => 'permissions.store']);
        Permission::create(['name' => 'permissions.update']);
        Permission::create(['name' => 'permissions.destroy']);
        //Role list*
        Permission::create(['name' => 'roles.index']);
        Permission::create(['name' => 'roles.store']);
        Permission::create(['name' => 'roles.update']);
        Permission::create(['name' => 'roles.destroy']);
        //City list*
        Permission::create(['name' => 'cities.index']);
        Permission::create(['name' => 'cities.store']);
        Permission::create(['name' => 'cities.update']);
        Permission::create(['name' => 'cities.destroy']);
        //Agency list*
        Permission::create(['name' => 'agencies.index']);
        Permission::create(['name' => 'agencies.store']);
        Permission::create(['name' => 'agencies.update']);
        Permission::create(['name' => 'agencies.destroy']);
        //User list*
        Permission::create(['name' => 'users.index']);
        Permission::create(['name' => 'users.store']);
        Permission::create(['name' => 'users.update']);
        Permission::create(['name' => 'users.destroy']);
        Permission::create(['name' => 'users.updateProfile']);
        //Folder list*
        Permission::create(['name' => 'folders.index']);
        Permission::create(['name' => 'folders.store']);
        Permission::create(['name' => 'folders.update']);
        Permission::create(['name' => 'folders.destroy']);
        //Assign list*
        Permission::create(['name' => 'assigns.index']);
        Permission::create(['name' => 'assigns.store']);
        Permission::create(['name' => 'assigns.update']);
        Permission::create(['name' => 'assigns.destroy']);
        //Observed list*
        Permission::create(['name' => 'observeds.index']);
        Permission::create(['name' => 'observeds.store']);
        Permission::create(['name' => 'observeds.update']);
        Permission::create(['name' => 'observeds.destroy']);
        //Approved list*
        Permission::create(['name' => 'approveds.index']);
        Permission::create(['name' => 'approveds.store']);
        Permission::create(['name' => 'approveds.update']);
        Permission::create(['name' => 'approveds.destroy']);
        //Rejected list*
        Permission::create(['name' => 'rejecteds.index']);
        Permission::create(['name' => 'rejecteds.store']);
        Permission::create(['name' => 'rejecteds.update']);
        Permission::create(['name' => 'rejecteds.destroy']);
        //Disbursement list*
        Permission::create(['name' => 'disbursements.index']);
        Permission::create(['name' => 'disbursements.store']);
        Permission::create(['name' => 'disbursements.update']);
        Permission::create(['name' => 'disbursements.destroy']);

        //Arqueo list*
        Permission::create(['name' => 'arqueos.index']);
        Permission::create(['name' => 'arqueos.store']);
        Permission::create(['name' => 'arqueos.update']);
        Permission::create(['name' => 'arqueos.destroy']);
        //Entrada list*
        Permission::create(['name' => 'entradas.index']);
        Permission::create(['name' => 'entradas.store']);
        Permission::create(['name' => 'entradas.update']);
        Permission::create(['name' => 'entradas.destroy']);
        //Salida list*
        Permission::create(['name' => 'salidas.index']);
        Permission::create(['name' => 'salidas.store']);
        Permission::create(['name' => 'salidas.update']);
        Permission::create(['name' => 'salidas.destroy']);
        //Boliviano list*
        Permission::create(['name' => 'bolivianos.index']);
        Permission::create(['name' => 'bolivianos.store']);
        Permission::create(['name' => 'bolivianos.update']);
        Permission::create(['name' => 'bolivianos.destroy']);
        //Dolar list*
        Permission::create(['name' => 'dolars.index']);
        Permission::create(['name' => 'dolars.store']);
        Permission::create(['name' => 'dolars.update']);
        Permission::create(['name' => 'dolars.destroy']);
        //Report*
        Permission::create(['name' => 'consolidados.index']);
        Permission::create(['name' => 'consolidados.store']);
        Permission::create(['name' => 'consolidados.update']);
        Permission::create(['name' => 'consolidados.destroy']);
        //Banco*
        Permission::create(['name' => 'bancos.index']);
        Permission::create(['name' => 'bancos.store']);
        Permission::create(['name' => 'bancos.update']);
        Permission::create(['name' => 'bancos.destroy']);

        // Arqueo JA*
        Permission::create(['name' => 'arqueos.indexja']);
    }
}
