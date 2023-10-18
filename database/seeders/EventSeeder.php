<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Ramsey\Uuid\Uuid;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
 
    	for($i = 1; $i <= 500; $i++){
            $faker = Faker::create('id_ID');
            $a=array("bali","bandung","jakarta","medan","semarang", "surabaya");
            $random_keys=array_rand($a,1);
    	      // insert data ke table pegawai menggunakan Faker
              \App\Models\Event::factory()->create([
                'fullname' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'city' => $a[$random_keys],
                'uuid' => Uuid::uuid4()->toString(),
                'status' => 0
              ]);
        }
 
    }
}
