<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// *
        $GG = Role::create(['name' => 'GERENCIA GENERAL']);
		$GG->givePermissionTo([

        	'bancos.index',
        	'bancos.store',
        	'bancos.update',
        	'bancos.destroy',

            'consolidados.index',
		]);

		$RRHH = Role::create(['name' => 'RRHH']);
		$RRHH->givePermissionTo([

        	'bancos.index',
        	'bancos.store',
        	'bancos.update',
        	'bancos.destroy',
		]);

		// *
		$GNCGO = Role::create(['name' => 'CONTABILIDAD']);
		$GNCGO->givePermissionTo([

        	'arqueos.index',
        	'arqueos.store',
        	'arqueos.update',
        	'arqueos.destroy',

        	'entradas.index',
        	'entradas.store',
        	'entradas.update',
        	'entradas.destroy',

        	'salidas.index',
        	'salidas.store',
        	'salidas.update',
        	'salidas.destroy',

        	'bolivianos.index',
        	'bolivianos.store',
        	'bolivianos.update',
        	'bolivianos.destroy',

        	'dolars.index',
        	'dolars.store',
        	'dolars.update',
        	'dolars.destroy',

            'consolidados.index',
		]);

		// *
		$GNC = Role::create(['name' => 'COMERCIAL']);
		$GNC->givePermissionTo([

        	'assigns.update',

        	'observeds.store',

        	'approveds.store',

        	'rejecteds.store',

            'consolidados.index',
		]);

		// *
		$GNAL = Role::create(['name' => 'ASESORIA LEGAL']);
		$GNAL->givePermissionTo([
        ]);

		// *
		$GNO = Role::create(['name' => 'OPERACIONES']);
		$GNO->givePermissionTo([

        	'disbursements.store',
        	'disbursements.update',
        	'disbursements.destroy',

        	'arqueos.index',
        	'arqueos.store',
        	'arqueos.update',
        	'arqueos.destroy',

        	'entradas.store',
        	'entradas.update',
        	'entradas.destroy',

        	'salidas.store',
        	'salidas.update',
        	'salidas.destroy',

        	'bolivianos.store',
        	'bolivianos.update',
        	'bolivianos.destroy',
			
        	'dolars.store',
        	'dolars.update',
        	'dolars.destroy',

            'consolidados.index',
        ]);

		$JNTIC = Role::create(['name' => 'TIC']);
		$JNTIC->givePermissionTo([
        	'permissions.index',
        	'permissions.store',
        	'permissions.update',
            'permissions.destroy',

        	'roles.index',
        	'roles.store',
        	'roles.update',
            'roles.destroy',

        	'cities.index',
        	'cities.store',
        	'cities.update',
        	'cities.destroy',

        	'agencies.index',
        	'agencies.store',
        	'agencies.update',
        	'agencies.destroy',

            'users.index',
        	'users.store',
        	'users.update',
        	'users.destroy',

        	'folders.index',
        	'folders.store',
        	'folders.update',
        	'folders.destroy',

        	'assigns.index',
        	'assigns.store',
        	'assigns.update',
        	'assigns.destroy',

        	'observeds.index',
        	'observeds.store',
        	'observeds.update',
        	'observeds.destroy',

        	'approveds.index',
        	'approveds.store',
        	'approveds.update',
        	'approveds.destroy',

        	'rejecteds.index',
        	'rejecteds.store',
        	'rejecteds.update',
        	'rejecteds.destroy',

        	'disbursements.index',
        	'disbursements.store',
        	'disbursements.update',
        	'disbursements.destroy',

        	'arqueos.index',
        	'arqueos.store',
        	'arqueos.update',
        	'arqueos.destroy',

        	'entradas.index',
        	'entradas.store',
        	'entradas.update',
        	'entradas.destroy',

        	'salidas.index',
        	'salidas.store',
        	'salidas.update',
        	'salidas.destroy',

        	'bolivianos.index',
        	'bolivianos.store',
        	'bolivianos.update',
        	'bolivianos.destroy',

        	'dolars.index',
        	'dolars.store',
        	'dolars.update',
        	'dolars.destroy',

        	'bancos.index',
        	'bancos.store',
        	'bancos.update',
        	'bancos.destroy',

            'consolidados.index',
        ]);
	// *
			$JA = Role::create(['name' => 'JEFE NACIONAL']);
			$JA->givePermissionTo([
				'observeds.store',
				'approveds.store',
				'rejecteds.store'
			]);
// *
		$JA = Role::create(['name' => 'JEFE DE AGENCIA']);
		$JA->givePermissionTo([
        	'folders.store',
        	'observeds.store',
        	'approveds.store',
        	'rejecteds.store',

        	'entradas.store',
        	'salidas.store',
        	'bolivianos.store',
        	'dolars.store',
			'arqueos.indexja'
		]);
// *
		$ASESOR = Role::create(['name' => 'ASESOR']);
		$ASESOR->givePermissionTo([
        	'folders.store',
            'arqueos.indexja',

			'entradas.store',
			'salidas.store',
			'bolivianos.store',
        	'dolars.store',
		]);
    }
}
