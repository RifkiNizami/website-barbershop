<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class BarbershopSeeder extends Seeder
{
    public function run(): void
    {
        // Sample Admin & Customer Users
        $admin = User::firstOrCreate(
            ['email' => 'admin@rusdibarber.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password'),
            ]
        );

        $customer = User::firstOrCreate(
            ['email' => 'dimas@gmail.com'],
            [
                'name' => 'Dimas Pratama',
                'password' => Hash::make('password'),
            ]
        );

        // Sample Services
        $services = [
            [
                'nama_layanan' => 'Gentlemen Haircut + Wash',
                'kategori' => 'Haircut',
                'harga' => 65000,
                'durasi' => 45,
                'deskripsi' => 'Konsultasi gaya rambut, potong presisi, cuci rambut hangat, dan styling pomade.',
                'is_active' => true,
            ],
            [
                'nama_layanan' => 'Classic Beard Trim & Shave',
                'kategori' => 'Shaving',
                'harga' => 45000,
                'durasi' => 30,
                'deskripsi' => 'Cukur jenggot & kumis profesional dengan handuk hangat dan aftershave lotion.',
                'is_active' => true,
            ],
            [
                'nama_layanan' => 'Hair Treatment + Styling',
                'kategori' => 'Treatment',
                'harga' => 85000,
                'durasi' => 50,
                'deskripsi' => 'Perawatan akar rambut, pijat relaksasi kepala, tonic vitamin, dan styling.',
                'is_active' => true,
            ],
            [
                'nama_layanan' => 'Royal Grooming Package',
                'kategori' => 'Combo Package',
                'harga' => 120000,
                'durasi' => 75,
                'deskripsi' => 'Paket komplit: Haircut + Wash + Hot Towel Shave + Pijat Kepala + Styling Premium.',
                'is_active' => true,
            ],
            [
                'nama_layanan' => 'Express Cut',
                'kategori' => 'Haircut',
                'harga' => 50000,
                'durasi' => 30,
                'deskripsi' => 'Potong rambut cepat & rapi untuk pria sibuk.',
                'is_active' => true,
            ],
        ];

        foreach ($services as $svc) {
            Service::firstOrCreate(['nama_layanan' => $svc['nama_layanan']], $svc);
        }

        // Sample Bookings
        $bookings = [
            [
                'booking_code' => 'BK-1049',
                'nama_pelanggan' => 'Dimas Pratama',
                'no_whatsapp' => '081234567890',
                'layanan' => 'Gentlemen Haircut + Wash',
                'barber' => 'Rusdi',
                'tanggal' => now()->format('Y-m-d'),
                'jam' => '10:30 WIB',
                'catatan' => 'Request model Taper Fade',
                'harga' => 65000,
                'status' => 'confirmed',
                'user_id' => $customer->id,
            ],
            [
                'booking_code' => 'BK-1050',
                'nama_pelanggan' => 'Andi Wijaya',
                'no_whatsapp' => '085712345678',
                'layanan' => 'Classic Beard Trim & Shave',
                'barber' => 'Farhan',
                'tanggal' => now()->format('Y-m-d'),
                'jam' => '11:15 WIB',
                'catatan' => 'Rapikan kumis tipis',
                'harga' => 45000,
                'status' => 'pending',
                'user_id' => null,
            ],
            [
                'booking_code' => 'BK-1051',
                'nama_pelanggan' => 'Reza Fahlevi',
                'no_whatsapp' => '082198765432',
                'layanan' => 'Hair Treatment + Styling',
                'barber' => 'Budi',
                'tanggal' => now()->subDay()->format('Y-m-d'),
                'jam' => '13:00 WIB',
                'catatan' => 'Kulit kepala sensitif',
                'harga' => 85000,
                'status' => 'completed',
                'user_id' => null,
            ],
            [
                'booking_code' => 'BK-1052',
                'nama_pelanggan' => 'Kevin Sanjaya',
                'no_whatsapp' => '089611223344',
                'layanan' => 'Royal Grooming Package',
                'barber' => 'Rusdi',
                'tanggal' => now()->addDay()->format('Y-m-d'),
                'jam' => '14:30 WIB',
                'catatan' => 'Full service',
                'harga' => 120000,
                'status' => 'confirmed',
                'user_id' => null,
            ],
        ];

        foreach ($bookings as $bk) {
            Booking::firstOrCreate(['booking_code' => $bk['booking_code']], $bk);
        }
    }
}
