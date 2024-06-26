<?php

namespace Database\Seeders;

use App\Models\UserCorrespondent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserCorrespondentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collections = [
           ['name'=>'Deni','age'=>'21','gender'=>'laki-laki','purchase_frequency'=>'1','correspondents'=>'[1,2,3,4,5,4,3,2,1]'],
           ['name'=>'Fitri','age'=>'21','gender'=>'perempuan','purchase_frequency'=>'1','correspondents'=>'[5,4,3,2,1,2,3,4,5]'],
           ['name'=>'Amel','age'=>'21','gender'=>'perempuan','purchase_frequency'=>'1','correspondents'=>'[4,1,3,2,2,3,4,9,5]'],
           ['name'=>'Dino','age'=>'21','gender'=>'laki-laki','purchase_frequency'=>'1','correspondents'=>'[1,1,1,3,4,5,6,7,8]'],
           ['name'=>'Figi','age'=>'21','gender'=>'laki-laki','purchase_frequency'=>'1','correspondents'=>'[1,3,4,5,2,4,5,1,2]'],
           ['name'=>'Sumantro','age'=>'21','gender'=>'laki-laki','purchase_frequency'=>'1','correspondents'=>'[3,1,1,1,2,1,5,2,1]'],
           ['name'=>'Jaka','age'=>'21','gender'=>'laki-laki','purchase_frequency'=>'1','correspondents'=>' [5,1,2,4,1,2,4,5,1]'],
           ['name'=>'Sumeng','age'=>'21','gender'=>'laki-laki','purchase_frequency'=>'1','correspondents'=>' [1,2,3,2,3,1,4,5,1]'],
           ['name'=>'Kumeng','age'=>'21','gender'=>'laki-laki','purchase_frequency'=>'1','correspondents'=>' [5,1,3,1,2,1,5,3,2]'],
           ['name'=>'Putri','age'=>'21','gender'=>'perempuan','purchase_frequency'=>'1','correspondents'=>'[5,5,4,1,2,4,5,4,2]'],
           ['name'=>'Firma','age'=>'21','gender'=>'laki-laki','purchase_frequency'=>'1','correspondents'=>'[5,1,2,3,4,5,3,2,1]'],
           ['name'=>'Kasarang','age'=>'21','gender'=>'laki-laki','purchase_frequency'=>'1','correspondents'=>'[1,3,5,4,1,2,2,3,4]'],
        ];

        UserCorrespondent::insert($collections);
    }
}
