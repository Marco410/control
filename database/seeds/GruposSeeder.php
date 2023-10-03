<?php

use Illuminate\Database\Seeder;
use  \App\Models\grupo;

class GruposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('set foreign_key_checks = 0;');
        DB::table('grupo')->truncate();
        DB::statement('set foreign_key_checks = 1;');

        $grupo= new grupo();
        $grupo->id_grupo="1";
        $grupo->seccion='A';
        $grupo->id_carrera='adm';
        $grupo->id_materia='1';
        $grupo->id_prof='1';
        $grupo->periodo='agosto-diciembre';
        $grupo->save();

        $grupo= new grupo();
        $grupo->id_grupo="2";
        $grupo->seccion='A';
        $grupo->id_carrera='anim';
        $grupo->id_materia='DGD-1';
        $grupo->id_prof='2';
        $grupo->periodo='agosto-diciembre';
        $grupo->save();

        $grupo= new grupo();
        $grupo->seccion='A';
        $grupo->id_carrera='arq';
        $grupo->id_materia='DGD-1';
        $grupo->id_prof='2';
        $grupo->periodo='agosto-diciembre';
        $grupo->save();

        $grupo= new grupo();
        $grupo->seccion='A';
        $grupo->id_carrera='der';
        $grupo->id_materia='II-1';
        $grupo->id_prof='2';
        $grupo->periodo='agosto-diciembre';
        $grupo->save();

        $grupo= new grupo();
        $grupo->seccion='A';
        $grupo->id_carrera='fis';
        $grupo->id_materia='TID-1';
        $grupo->id_prof='2';
        $grupo->periodo='agosto-diciembre';
        $grupo->save();

        $grupo= new grupo();
        $grupo->seccion='A';
        $grupo->id_carrera='anim';
        $grupo->id_materia='QMC-1';
        $grupo->id_prof='2';
        $grupo->periodo='agosto-diciembre';
        $grupo->save();

        $grupo= new grupo();
        $grupo->seccion='A';
        $grupo->id_carrera='for';
        $grupo->id_materia='DGD-1';
        $grupo->id_prof='2';
        $grupo->periodo='agosto-diciembre';
        $grupo->save();

        $grupo= new grupo();
        $grupo->seccion='A';
        $grupo->id_carrera='anim';
        $grupo->id_materia='DGD-1';
        $grupo->id_prof='2';
        $grupo->periodo='agosto-diciembre';
        $grupo->save();

        $grupo= new grupo();
        $grupo->seccion='A';
        $grupo->id_carrera='ind';
        $grupo->id_materia='DGD-1';
        $grupo->id_prof='2';
        $grupo->periodo='agosto-diciembre';
        $grupo->save();

        $grupo= new grupo();
        $grupo->seccion='A';
        $grupo->id_carrera='anim';
        $grupo->id_materia='DGD-1';
        $grupo->id_prof='2';
        $grupo->periodo='agosto-diciembre';
        $grupo->save();

        $grupo= new grupo();
        $grupo->seccion='A';
        $grupo->id_carrera='isc';
        $grupo->id_materia='DGD-1';
        $grupo->id_prof='2';
        $grupo->periodo='agosto-diciembre';
        $grupo->save();

        $grupo= new grupo();
        $grupo->seccion='A';
        $grupo->id_carrera='mer';
        $grupo->id_materia='DGD-1';
        $grupo->id_prof='2';
        $grupo->periodo='agosto-diciembre';
        $grupo->save();

        $grupo= new grupo();
        $grupo->seccion='A';
        $grupo->id_carrera='neg';
        $grupo->id_materia='DGD-1';
        $grupo->id_prof='2';
        $grupo->periodo='agosto-diciembre';
        $grupo->save();


    }
}
