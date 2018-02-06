<?php

use Illuminate\Database\Seeder;
use App\dosen;
use App\jurusan;
use App\mahasiswa;
use App\matkul;
use App\wali;

class UlanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dosens')->delete();
        DB::table('jurusans')->delete();
        DB::table('mahasiswas')->delete();
        DB::table('walis')->delete();
        DB::table('matkuls')->delete();
        DB::table('matkul_mahasiswas')->delete();

        $dosen1 = dosen::create(array(
        	'nama' => 'Penti Setiawati','nipd'=>'112646','alamat'=>'Bandung','mata_kuliah'=>'MIPA'
        ));
        $dosen2 = dosen::create(array(
        	'nama' => 'Halimah','nipd'=>'2122100','alamat'=>'Jakarta','mata_kuliah'=>'FISiKA'
        ));
        $this->command->info('Dosen Telah Diisi !');

        $rpl = jurusan::create(array(
         	'nama_jurusan'=>'Rekayasa Perangkat Lunak'
         ));
        $tkr = jurusan::create(array(
         	'nama_jurusan'=>'Teknik Kendaraan Ringan'
         ));
        $tsm = jurusan::create(array(
         	'nama_jurusan'=>'Teknik Sepeda Motor'
         ));
        $ap = jurusan::create(array(
            'nama_jurusan'=>'Perkantoran'
         ));
        $this->command->info('Jurusan Telah Diisi !');

        $dina = mahasiswa::create(array(
        'nama_mahasiswa'=> 'Dina Novianti','nis'=>'00001','id_dosen'=>$dosen1->id,'id_jurusan'=> $rpl->id
        ));

        $ara = mahasiswa::create(array(
        'nama_mahasiswa'=> 'Diandra Aulia Putri','nis'=>'00002','id_dosen'=>$dosen1->id,'id_jurusan'=> $tkr->id
        ));
        $melan = mahasiswa::create(array(
        'nama_mahasiswa'=> 'Melan Noerjanati','nis'=>'00003','id_dosen'=>$dosen2->id,'id_jurusan'=> $tsm->id
        ));

        $this->command->info('Mahasiswa Telah Diisi!');

        wali::create(array(
        'nama'=>'Sholeh',
        'alamat'=>'rancamanyar',
        'id_mahasiswa'=>$dina->id
        ));
        wali::create(array(
        'nama'=>'Rusli',
        'alamat'=>'Rancakasiat',
        'id_mahasiswa'=>$ara->id
        ));
        wali::create(array(
        'nama'=>'Rahmat',
        'alamat'=>'Eropa',
        'id_mahasiswa'=>$melan->id
        ));

		$this->command->info('Wali Telah Diisi !');

		$ipa = matkul::create(array('nama_matkul'=>'IPA','kkm'=>'80'));
		$kimia = matkul::create(array('nama_matkul'=>'FISIKA','kkm'=>'85'));

		$dina->matkul()->attach($ipa->id);
        $ara->matkul()->attach($kimia->id);
		$melan->matkul()->attach($kimia->id);
		

		$this->command->info('Mahasiswa dan Mata Kuliah Telah Diisi !'); 
    }
}
