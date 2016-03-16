<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Posting;
use App\Following;
use App\Like;
use App\Comments;

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
		DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
			# Kosongin isi tabel
		DB::table('users')->truncate();
		DB::table('posting')->truncate();
		DB::table('following')->truncate();
		DB::table('likes')->truncate();
		DB::table('comments')->truncate();
		
		DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
		
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

		$tesi = User::create(array(
			'name' => 'Tesi',
			'email'  => 'tesi@gmail.com',
			'password' => '123456',
			'phone' => '081123456789',
			'info' => 'Good Mom, Smiley Mom',
			'photo' => 'user.jpg'));
			
		foreach(DB::table('users')->get() as $user){
			DB::table('users')->where('id', $user->id)->update(array('password'=>Hash::make($user->password)));
		}

			$this->command->info('user berhasil diisi!');


		$hillpark = Posting::create(array(
			'judul'  => 'Hillpark Sibolangit',
			'lat'  => '3.279145',
			'lng'  => '98.556708',
			'deskripsi'  => 'Sibolangit hillpark taman bermain',
			'user_id' => $heri->id,
			'photo'  => 'hillpark.jpg',
			'ip'  => '127.0.0.1'
		));

		$gundaling = Posting::create(array(
			'judul'  => 'Puncak Gundaling',
			'lat'  => '3.192161',
			'lng'  => '98.501283',
			'deskripsi'  => 'Gundaling adalah sebuah bukit di Berastagi, Kabupaten Karo, Sumatera Utara. Gundaling merupakan objek wisata di Berastagi. Gundaling terletak di 1.575 meter dari permukaan laut.Di Gundaling dapat terlihat Gunung Sibayak dan Gunung Sinabung',
			'user_id' => $heri->id,
			'photo'  => 'gundaling.jpg',
			'ip'  => '127.0.0.1'
		));

		$mursala = Posting::create(array(
			'judul'  => 'Air Terjun Mursala',
			'lat'  => '1.679123',
			'lng'  => '98.557148',
			'deskripsi'  => 'Air Terjun Mursala adalah salah satu air terjun di Indonesia yang terjunan airnya langsung jatuh ke laut.  Air terjun ini berada di Pulau Mursala, yang terletak diantara Pulau Sumatera dan Pulau Nias.',
			'user_id' => $dewi->id,
			'photo'  => 'mursala.jpg',
			'ip'  => '127.0.0.1'
		));

		$sibayak = Posting::create(array(
			'judul'  => 'Gunung Sibayak',
			'lat'  => '3.2386138',
			'lng'  => '98.5047266',
			'deskripsi'  => 'Pendakian ke puncak gunung sibayak - Berastagi, Kab.Karo, Sumatera utara',
			'user_id' => $gunawan->id,
			'photo'  => 'sibayak.jpg',
			'ip'  => '127.0.0.1'
		));
		
		$bukit = Posting::create(array(
			'judul'  => 'Bukit Lawang',
			'lat'  => '3.2386138',
			'lng'  => '98.5047266',
			'deskripsi'  => 'Bukit lawang, banyak orang hutan yang tinggal di hutan lindung gunung leuser.',
			'user_id' => $tesi->id,
			'photo'  => 'bukitlawang.jpg',
			'ip'  => '127.0.0.1'
		));


		$this->command->info('Posting telah diisi!');


		Following::create(array(
			'user_id'  => $heri->id,
			'followingid'  => $dewi->id
		));

		Following::create(array(
			'user_id'  => $dewi->id,
			'followingid'  => $heri->id
		));

		Following::create(array(
			'user_id'  => $gunawan->id,
			'followingid'  => $tesi->id
		));

		Following::create(array(
			'user_id'  => $gunawan->id,
			'followingid'  => $heri->id
		));

		Following::create(array(
			'user_id'  => $gunawan->id,
			'followingid'  => $dewi->id
		));
		
		$this->command->info('Following telah diisi!');
		
		Like::create(array(
			'post_id' => $hillpark->id,
			'user_id' => $tesi->id,
		));
		
		Like::create(array(
			'post_id' => $mursala->id,
			'user_id' => $gunawan->id,

		));
		
		Like::create(array(
			'post_id' => $gundaling->id,
			'user_id' => $heri->id,

		));

		$this->command->info('Like telah diisi!');
		
		Comments::create(array(
			'comment' => 'Ngeliat kembaran Bro disana!',
			'post_id' => $bukit->id,
			'user_id' => $gunawan->id,

		));

		$this->command->info('Comment telah diisi!');
	}
}
