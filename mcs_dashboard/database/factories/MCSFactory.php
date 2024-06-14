<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MCS;
use Faker\Generator as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MCS>
 */
class MCSFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $no_mcs = '628' . $this->faker->unique()->numberBetween(1000000000, 9999999999);
        $nama = $this->faker->randomElement(['Kasad', 'Wakasad', 'Wangkostrad', 'Kapushubad', 'Aster Kasad', 'Cadangan Pusat']);
        $satuan = $this->faker->randomElement(['KOSTRAD', 'MABESAD dan BALAKPUS', 'MAPUSHUBAD', 'TAMBAHAN NOMOR PATI']);
        $kategori = $this->faker->randomElement(['PATI', 'PAMEN', 'PAMA', 'BINTARA', 'TAMTAMA']);;
        $tgl_aktif = $this->faker->date();
        $paket_data = 'MCS ' . $this->faker->randomElement([3, 5, 12, 25, 40, 85]) . 'GB';
        // $paket_data = 'MCS ' . $this->faker->numberBetween(50, 100) . 'GB';

        return [
            'no_mcs' => $no_mcs,
            'nama' => $nama,
            'satuan' => $satuan,
            'kategori' => $kategori,
            'tgl_aktif' => $tgl_aktif,
            'paket_data' => $paket_data,
            'status' => $this->faker->randomElement(['aktif', 'non-aktif']),
        ];
        // return [
        //     'no_mcs' => $faker->unique()->randomNumber(),
        //     'nama' => $faker->word,
        //     'satuan' => $faker->word,
        //     'kategori' => $faker->word,
        //     'tgl_aktif' => $faker->date(),
        //     'paket_data' => $faker->word,
        //     'status' => $faker->randomElement(['aktif', 'non-aktif']),
        // ];
    }
}



