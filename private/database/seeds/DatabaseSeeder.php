<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Posting;
use App\Following;
use App\Like;
use App\Itinerary;
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
		DB::table('itinerary')->truncate();
		
		DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
		
		$heri = User::create(array(
			'name' => 'Heri Tri',
			'email'  => 'he@ri.com',
			'password' => '123456',
			'phone' => '083198696258',
			'info' => 'My Trip My adventure',
			'photo' => 'heri_yoai6w',
			'slug' => 'heri.tri'));

			$this->command->info('user berhasil diisi!');

		$dewi = User::create(array(
			'name' => 'Dewi',
			'email'  => 'dewi@gmail.com',
			'password' => '123456',
			'phone' => '08123456789',
			'info' => 'Good Girl is Bad Girl',
			'photo' => 'art_tcu1bi',
			'slug' => 'dewi'));

			$this->command->info('user berhasil diisi!');

		$gunawan = User::create(array(
			'name' => 'Gunawan',
			'email'  => 'gunawan@gmail.com',
			'password' => '123456',
			'phone' => '081123456789',
			'info' => 'Bad Boy, Smiley Boy',
			'photo' => '14585364145_jd1t1b',
			'slug' => 'gunawan'));

			$this->command->info('user berhasil diisi!');

		$tesi = User::create(array(
			'name' => 'Tesi',
			'email'  => 'tesi@gmail.com',
			'password' => '123456',
			'phone' => '081123456789',
			'info' => 'Good Mom, Smiley Mom',
			'photo' => 'face_rx74zw',
			'slug' => 'tesi'));

			$this->command->info('user berhasil diisi!');

		$rika = User::create(array(
			'name' => 'Rika Andriani',
			'email'  => 'rikatrieka@gmail.com',
			'password' => '123456',
			'phone' => '08526285xxx3',
			'info' => 'Adventure Girl',
			'photo' => 'DSC_0715_ldz6vk',
			'slug' => 'rika.andriani'));
			
		foreach(DB::table('users')->get() as $user){
			DB::table('users')->where('id', $user->id)->update(array('password'=>Hash::make($user->password)));
		}

			$this->command->info('user berhasil diisi!');


		$hillpark = Posting::create(array(
			'judul'  => 'Hillpark Sibolangit',
			'lat'  => '3.279145',
			'lng'  => '98.556708',
			'deskripsi'  => 'Sibolangit hillpark taman bermain',
			'user_id' => $rika->id,
			'photo'  => 'hillpark_fk0jy2',
			'ip'  => '127.0.0.1',
			'slug' => 'hillpark-sibolangit'
		));

		$gundaling = Posting::create(array(
			'judul'  => 'Puncak Gundaling',
			'lat'  => '3.192161',
			'lng'  => '98.501283',
			'deskripsi'  => 'Gundaling adalah sebuah bukit di Berastagi, Kabupaten Karo, Sumatera Utara. Gundaling merupakan objek wisata di Berastagi. Gundaling terletak di 1.575 meter dari permukaan laut.Di Gundaling dapat terlihat Gunung Sibayak dan Gunung Sinabung',
			'user_id' => $heri->id,
			'photo'  => '4112022008378_dezpcb',
			'ip'  => '127.0.0.1',
			'slug' => 'puncak-gundaling'
		));

		$mursala = Posting::create(array(
			'judul'  => 'Air Terjun Mursala',
			'lat'  => '1.679123',
			'lng'  => '98.557148',
			'deskripsi'  => 'Air Terjun Mursala adalah salah satu air terjun di Indonesia yang terjunan airnya langsung jatuh ke laut.  Air terjun ini berada di Pulau Mursala, yang terletak diantara Pulau Sumatera dan Pulau Nias.',
			'user_id' => $dewi->id,
			'photo'  => '54142224749774_dysicw',
			'ip'  => '127.0.0.1',
			'slug' => 'air-terjun-mursala'
		));

		$sibayak = Posting::create(array(
			'judul'  => 'Gunung Sibayak',
			'lat'  => '3.2386138',
			'lng'  => '98.5047266',
			'deskripsi'  => 'Pendakian ke puncak gunung sibayak - Berastagi, Kab.Karo, Sumatera utara',
			'user_id' => $rika->id,
			'photo'  => 'FB_20150513_12_39_07_Saved_Picture_rgxgxa',
			'ip'  => '127.0.0.1',
			'slug' => 'gunung-sibayak'
		));
		
		$bukit = Posting::create(array(
			'judul'  => 'Bukit Lawang',
			'lat'  => '3.2386138',
			'lng'  => '98.5047266',
			'deskripsi'  => 'Bukit lawang, banyak orang hutan yang tinggal di hutan lindung gunung leuser.',
			'user_id' => $tesi->id,
			'photo'  => 'bukit-lawang-4_zlh7okg',
			'ip'  => '127.0.0.1',
			'slug' => 'bukit-lawang'
		));


		$this->command->info('Posting telah diisi!');

		$toba = Itinerary::create(array(
			'judul'  => 'Itinerary ke Danau Toba',
			'startdate'  => '2016-04-04',
			'enddate'  => '2016-04-07',
			'user_id' => $heri->id
		));

		$dewi = Itinerary::create(array(
			'judul'  => 'Itinerary ke Tangkahan',
			'startdate'  => '2016-04-06',
			'enddate'  => '2016-04-08',
			'user_id' => $heri->id
		));

		$this->command->info('Itinerary telah diisi!');


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
