<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 18
        $admin = User::create([
            'name'       => 'Roger Huarachi Tapia',
            'email'      => 'proeza.roger@gmail.com',
            'password'      => bcrypt('6754212567542125'),
            'agency_id'      => 1,
        ]);
        $admin->assignRole('TIC');

        // 2
        $gg = User::create([
            'name'       => 'LUIS ALEJANDRO ARZE RICO',
            'email'      => 'proeza.ale@gmail.com',
            'password'      => bcrypt('proezaalejandro2021'),
            'agency_id'      => 1,
        ]);
        $gg->assignRole('GERENCIA GENERAL');

        // 3
        $rrhh = User::create([
            'name'       => 'MARTHA PAOLA AMADOR',
            'email'      => 'proeza.marthapaola@gmail.com',
            'password'      => bcrypt('proezamarthapaola2021'),
            'agency_id'      => 1,
        ]);
        $rrhh->assignRole('RRHH');

        $gnal = User::create([
            'name'       => 'TERESA ALBA MIRANDA',
            'email'      => 'proeza.teresa@gmail.com',
            'password'      => bcrypt('proezateresa2021'),
            'agency_id'      => 1,
        ]);
        $gnal->assignRole('ASESORIA LEGAL');

        // 4
        $gnc = User::create([
            'name'       => 'GUALBERTO EDSSON COCA VARGAS',
            'email'      => 'proeza.edsson@gmail.com',
            'password'      => bcrypt('proezaedsson2021'),
            'agency_id'      => 1,
        ]);
        $gnc->assignRole('COMERCIAL');

        $gncgo = User::create([
            'name'       => 'LIMBERT RODRÍGUEZ ORELLANA',
            'email'      => 'proeza.limbert@gmail.com',
            'password'      => bcrypt('proezalimbert2021'),
            'agency_id'      => 1,
        ]);
        $gncgo->assignRole('CONTABILIDAD');

        // 5
        $gno = User::create([
            'name'       => 'JHOANA BRENDA JIMENEZ FLORES',
            'email'      => 'proeza.brenda@gmail.com',
            'password'      => bcrypt('proezabrenda2021'),
            'agency_id'      => 1,
        ]);
        $gno->assignRole('OPERACIONES');

        $jas = [
            [
                // 6
                'name'       => 'ELIZABETH CALLE COAQUIRA',
                'email'      => 'proeza.elycalle@gmail.com',
                'password'      => bcrypt('proezaelycalle2021'),
                'agency_id'      => 2,
            ],
            [
                // 10
                'name'       => 'ALEX GUERRA GUZMAN',
                'email'      => 'proeza.alex@gmail.com',
                'password'      => bcrypt('proezaalex2021'),
                'agency_id'      => 3,
            ],
            [
                // 8
                'name'       => 'ROXANA LLANOS MAMANI',
                'email'      => 'proeza.roxana@gmail.com',
                'password'      => bcrypt('proezaroxana2021'),
                'agency_id'      => 4,
            ],
            [
                // 9
                'name'       => 'VERONICA ANEIVA SALAZAR',
                'email'      => 'proeza.veronica@gmail.com',
                'password'      => bcrypt('proezaveronica2021'),
                'agency_id'      => 6,
            ]
        ];
        foreach ($jas as $ja) {
            $userG = User::create([
                'name'       => $ja['name'],
                'email'       => $ja['email'],
                'password'       => $ja['password'],
                'agency_id'       => $ja['agency_id'],
            ]);
            $userG->assignRole('JEFE DE AGENCIA');
        }


        $asesors = [
            [
                // 11
                'name'       => 'CARLA ANDREA CLAROS PEREDO',
                'email'      => 'proeza.carla22@gmail.com',
                'password'      => bcrypt('proezacarla222021'),
                'agency_id'      => 2,
            ],
            [
                // 12
                'name'       => 'JHONNY PEDRO HUAYHUASI SOLIS',
                'email'      => 'proeza.jhonny9@gmail.com',
                'password'      => bcrypt('proezajhonny92021'),
                'agency_id'      => 2,
            ],
            [
                // 7
                'name'       => 'PABLO CHOQUE CAYO',
                'email'      => 'proeza.pablochoque@gmail.com',
                'password'      => bcrypt('proezapablochoque2021'),
                'agency_id'      => 3,
            ],
            [
                // 13
                'name'       => 'ARACELY MONTOYA ANDIA',
                'email'      => 'proeza.aracely@gmail.com',
                'password'      => bcrypt('proezaaracely2021'),
                'agency_id'      => 3,
            ],
            [
                // 14
                'name'       => 'MERY GARCIA AÑAMOR',
                'email'      => 'proeza.merygarcia@gmail.com',
                'password'      => bcrypt('proezamerygarcia2021'),
                'agency_id'      => 2,
            ],
            [
                // 15
                'name'       => 'ROCIO CLAROS ROJAS',
                'email'      => 'proeza.rocio@gmail.com',
                'password'      => bcrypt('proezarocio2021'),
                'agency_id'      => 4,
            ],
            [
                'name'       => 'LISCIEN MARIELA SANTALLA ANCE',
                'email'      => 'proeza.mariela@gmail.com',
                'password'      => bcrypt('proezamariela2021'),
                'agency_id'      => 5,
            ],      
            [
                'name'       => 'NIDELVIA JIMÉNEZ HUARAYO',
                'email'      => 'proeza.nidelvia@gmail.com',
                'password'      => bcrypt('proezanidelvia2021'),
                'agency_id'      => 5,
            ],      
            [
                // 20
                'name'       => 'LIDIA LEQUIPE QUISPE',
                'email'      => 'proeza.lidia@gmail.com',
                'password'      => bcrypt('proezalidia92021'),
                'agency_id'      => 6,
            ],
            [
                // 19
                'name'       => 'WILLIAMS YHAMIL SIRPA',
                'email'      => 'proeza.williams@gmail.com',
                'password'      => bcrypt('proezawilliams2021'),
                'agency_id'      => 6,
            ],
        ];
        foreach ($asesors as $asesor) {
            $userG = User::create([
                'name'       => $asesor['name'],
                'email'       => $asesor['email'],
                'password'       => $asesor['password'],
                'agency_id'       => $asesor['agency_id'],
            ]);
            $userG->assignRole('ASESOR');
        }
    }
}
