<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimonial::truncate();

        Testimonial::create([
            'client_name' => 'Sarah Vance',
            'client_role' => 'VP of Infrastructure, CloudScale',
            'is_verified' => true,
            'rating' => 5,
            'quote_text' => 'AI-Solutions has transformed our multi-database synchronization workflows completely. The Quantum Neural Mesh works flawlessly and sub-millisecond delays are real!',
            'client_avatar' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAZOMpbR1qDj3ExFCXR4MCv7q_igsj3hn5b6aXp5jLL47Qj_ybceO5bd4kbHctYzIOXdOAX82rVXFVGouaoM30iZ7QhC-NdQVjLWruBfPtwU68RX_bfj6CtKMmaMW_CAquAoJU0BKjVw0VbNNcEhiWm4Q5x19Qi2hVTx4dLGsJnpp3tlX2rQi9_KLQU6HPGP_LkrGKmDylFRYHlmR2nVOI_XEkIN3UcS_QL3iiaz5NgF3MNxMaNR7lWK7odHduM8OcxiO-7b9jlCKKx',
        ]);

        Testimonial::create([
            'client_name' => 'Michael Chen',
            'client_role' => 'Director of Security, FinGrid',
            'is_verified' => true,
            'rating' => 5,
            'quote_text' => 'The Aegis Sentinel dashboard is incredible. Having continuous threat evaluation logs within sandboxed agents gave our compliance team peace of mind.',
            'client_avatar' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCdNgFxYrnQnolDvKBrAMf7VMRGvd0KoDgGQbA80olloDoYS87F2zZN9m8KQ2RoGEktkK8x-Q7M3BL2aQUbOhhV8Yo8mWGJGBxrRpu4uWbIcRHBd-UuxIg3_BIiJNy2yRlEHTkdiRIkB_CIDAWECT1zq4V0zTFp6uhQivsNxhxhDXEpfl1XAtpTsm-7xJbR0-RGYPamlW8b510X5ljrYBsrL8C9XiSk4ahwc9kA1D3hB4xiP4Tv9hocjFJZnF687fqyGdopdOXGroY9',
        ]);
    }
}
