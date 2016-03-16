<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Posting;
use App\followuser;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UserPostingSeeder');
		$this->command->info('SeederRelasi berhasil');
	}
}

class UserPostingSeeder extends Seeder {
	public function run()
	{
			# Kosongin isi tabel
		DB::table('users')->delete();
		DB::table('posting')->delete();

		$heri = User::create(array(
			'name' => 'Heri Tri',
			'email'  => 'he@ri.com',
			'password' => '123456',
			'phone' => '083198696258',
			'info' => 'My Trip My adventure',
			'photo' => 'user.jpg'));

			$this->command->info('user berhasil diisi!');

		$dewi = User::create(array(
			'name' => 'Dewi',
			'email'  => 'dewi@gmail.com',
			'password' => '123456',
			'phone' => '08123456789',
			'info' => 'Good Girl is Bad Girl',
			'photo' => 'user.jpg'));

			$this->command->info('user berhasil diisi!');

		$gunawan = User::create(array(
			'name' => 'Gunawan',
			'email'  => 'gunawan@gmail.com',
			'password' => '123456',
			'phone' => '081123456789',
			'info' => 'Bad Boy, Smiley Boy',
			'photo' => 'user.jpg'));

			$this->command->info('user berhasil diisi!');


		Posting::create(array(
			'judul'  => 'Hillpark Sibolangit',
			'lat'  => '3.279145',
			'lng'  => '98.556708',
			'deskripsi'  => 'Sibolangit hillpark taman bermain',
			'iduser' => $heri->id,
			'photo'  => 'hillpark.jpg',
			'ip'  => '127.0.0.1'
		));

		Posting::create(array(
			'judul'  => 'Puncak Gundaling',
			'lat'  => '3.192161',
			'lng'  => '98.501283',
			'deskripsi'  => 'Gundaling adalah sebuah bukit di Berastagi, Kabupaten Karo, Sumatera Utara. Gundaling merupakan objek wisata di Berastagi. Gundaling terletak di 1.575 meter dari permukaan laut.Di Gundaling dapat terlihat Gunung Sibayak dan Gunung Sinabung',
			'iduser' => $heri->id,
			'photo'  => 'gundaling.jpg',
			'ip'  => '127.0.0.1'
		));

		Posting::create(array(
			'judul'  => 'Air Terjun Mursala',
			'lat'  => '1.679123',
			'lng'  => '98.557148',
			'deskripsi'  => 'Air Terjun Mursala adalah salah satu air terjun di Indonesia yang terjunan airnya langsung jatuh ke laut.  Air terjun ini berada di Pulau Mursala, yang terletak diantara Pulau Sumatera dan Pulau Nias.',
			'iduser' => $dewi->id,
			'photo'  => 'mursala.jpg',
			'ip'  => '127.0.0.1'
		));

		Posting::create(array(
			'judul'  => 'Gunung Sibayak',
			'lat'  => '3.2386138',
			'lng'  => '98.5047266',
			'deskripsi'  => 'Pendakian ke puncak gunung sibayak - Berastagi, Kab.Karo, Sumatera utara',
			'iduser' => $gunawan->id,
			'photo'  => 'sibayak.jpg',
			'ip'  => '127.0.0.1'
		));


		$this->command->info('Posting telah diisi!');


		followuser::create(array(
			'iduser'  => $heri->id,
			'followingid'  => '5'
		));

		followuser::create(array(
			'iduser'  => $dewi->id,
			'followingid'  => '4'
		));

		followuser::create(array(
			'iduser'  => $gunawan->id,
			'followingid'  => '4'
		));

		followuser::create(array(
			'iduser'  => $gunawan->id,
			'followingid'  => '5'
		));
	}
}
