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
        // 1. Sample Admin User
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password'), 
                'phone' => '081234567890',
                'role' => 'admin'
            ]
        );

        // 2. Sample Customer User
        $customer = User::firstOrCreate(
            ['email' => 'dimas@gmail.com'],
            [
                'name' => 'Dimas Pratama',
                'password' => Hash::make('password'),
                'phone' => '089876543210',
                'role' => 'customer'
            ]
        );

        // 3. Sample Services
        $services = [
            [
                'nama_layanan' => 'Gentleman Haircut & Styling',
                'kategori' => 'Haircut',
                'harga' => 65000,
                'durasi' => 45,
                'deskripsi' => 'Potong rambut presisi sesuai bentuk wajah, cuci rambut, pijat kepala ringan, dan konsultasi gaya.',
                'is_active' => true,
            ],
            [
                'nama_layanan' => 'Beard Trim & Hot Towel Shave',
                'kategori' => 'Shaving',
                'harga' => 45000,
                'durasi' => 30,
                'deskripsi' => 'Merapikan brewok dengan handuk hangat, krim cukur eksklusif, dan pisau cukur steril.',
                'is_active' => true,
            ],
            [
                'nama_layanan' => 'Hair Coloring & Highlight',
                'kategori' => 'Coloring',
                'harga' => 120000,
                'durasi' => 60,
                'deskripsi' => 'Pewarnaan rambut profesional menggunakan bahan berkualitas tinggi yang aman untuk kulit kepala.',
                'is_active' => true,
            ],
            [
                'nama_layanan' => 'VIP Full Grooming Package',
                'kategori' => 'Package',
                'harga' => 150000,
                'durasi' => 90,
                'deskripsi' => 'Paket komplit: Potong rambut, beard trim, hair mask treatment, pijat relaksasi, dan minuman gratis.',
                'is_active' => true,
            ],
        ];

        foreach ($services as $svc) {
            Service::firstOrCreate(['nama_layanan' => $svc['nama_layanan']], $svc);
        }

        // 4. Sample Bookings
        $sampleBookings = [
            [
                'booking_code' => 'BK-1001',
                'nama_pelanggan' => 'Dimas Pratama',
                'no_whatsapp' => '089876543210',
                'layanan' => 'Gentleman Haircut & Styling',
                'barber' => 'Mas Rusdi (Master Barber)',
                'tanggal' => now()->format('Y-m-d'),
                'jam' => '14.00 WIB',
                'catatan' => 'Minta potong taper fade tipis.',
                'harga' => 65000,
                'status' => 'confirmed',
                'user_id' => $customer ? $customer->user_id : null,
            ],
            [
                'booking_code' => 'BK-1002',
                'nama_pelanggan' => 'Rian Hidayat',
                'no_whatsapp' => '081399887766',
                'layanan' => 'Beard Trim & Hot Towel Shave',
                'barber' => 'Mas Budi (Senior Barber)',
                'tanggal' => now()->format('Y-m-d'),
                'jam' => '16.30 WIB',
                'catatan' => 'Cukur rapi brewok.',
                'harga' => 45000,
                'status' => 'completed',
                'user_id' => null,
            ],
        ];

        foreach ($sampleBookings as $bk) {
            Booking::firstOrCreate(['booking_code' => $bk['booking_code']], $bk);
        }
    }
}