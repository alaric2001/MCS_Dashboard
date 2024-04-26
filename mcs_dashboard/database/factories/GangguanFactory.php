<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Gangguan;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gangguan>
 */
class GangguanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Ambil data_mcs_id acak
        $data_mcs_id = \App\Models\MCS::inRandomOrder()->first()->id;

        // Ambil no_mcs dari MCS yang sesuai dengan data_mcs_id
        $no_mcs = \App\Models\MCS::where('id', $data_mcs_id)->value('no_mcs');
        return [
            // 'data_mcs_id' => function () {
            //     // Mengambil ID acak dari model DataMCS
            //     return \App\Models\MCS::inRandomOrder()->first()->id;
            // },
            // 'no_mcs' => $this->faker->numerify('628##########'), // Nomor MCS acak
            'data_mcs_id' => $data_mcs_id,
            'no_mcs' => $no_mcs, // Menggunakan no_mcs dari MCS terkait
            'pic' => $this->faker->name(), // Nama PIC acak
            'no_hp_pic' => $this->faker->numerify('08##########'), // Nomor HP PIC acak
            // 'ket' => $this->faker->sentence(), // Keterangan acak
            'ket' => '-',
        ];
    }
}
