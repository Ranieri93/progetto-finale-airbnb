<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Apartment;

class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
/*        DB::table('apartments')->delete();*/
        // $json = File::get("database/data/MOCK_DATA.json");
        // $data = json_decode($json);
        // foreach ($data as $object) {
        //     Apartment::create(array(
        //         'id' => $object->id,
        //         'sommary_title' => $object->sommary_title,
        //         'room_number' => $object->room_number,
        //         'guest_number' => $object->guest_number,
        //         'wc_number' => $object->wc_number,
        //         'square_meters' => $object->square_meters,
        //         'latitude' => $object->latitude,
        //         'longitude' => $object->longitude,
        //         'cover_image' => $object->cover_image
        //     ));
        // }
        $apartments = config('apartments.apartments_db');
        foreach ($apartments as $apartment) {
            $new_apartment = new Apartment();
            $new_apartment->fill($apartment);
            $new_apartment->save();
        }
    }
}
