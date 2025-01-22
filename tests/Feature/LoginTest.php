<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
// use illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    // Test menampikan from Login
    public function test_login_from_can_be_displayed()
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
    }

    // Test Login yang berhasil
    public function test_user_can_login_with_valid_credentials()
    {
        $user = User::factory()->create([
            'email' => 'john.doe@example.com',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->post(route('login'), [
            'email' => 'john.doe@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('admin.products.index')); // jika login berhasil, diarahkan ke halaman admin
        $this->assertAuthenticatedAs($user); // pastikan pengguna sudah terautentikasi
    }

    // Test Login yang gagal karena E-Mail Salah
    public function test_user_cannot_login_with_invalid_email()
    {
        $response = $this->post(route('login'), [
            'email' => 'admin@gmail.com',
            'password' => 'password123',
        ]);

        $response->assertSessionHasErrors('email'); // memastikan ada error pada email
        $this->assertGuest(); // memastikan pengguna tidak terauthentikasi
    }

    // Test Login yang gagal karena password salah
    // public function test_user_cannot_login_with_invalid_password()
    // {
    //     $user = User::factory()->create([
    //         'email' => 'john.doe@example.com',
    //         'password' => Hash::make('password123'),
    //     ]);

    //     // Coba login dengan password yang salah
    //     $response = $this->post(route('login'), [
    //         'email' => 'john.doe@example.com',
    //         'password' => 'wrongpassword',
    //     ]);

    //     // Periksa apakah ada error pada password
    //     $response->assertSessionHasErrors('password');
    //     $this->assertGuest(); // Pastikan pengguna tidak terautentikasi
    // }

    public function test_user_cannot_login_with_invalid_password()
    {
        $this->withoutMiddleware(); // Nonaktifkan middleware jika perlu

        $response = $this->post(route('login'), [
            'email' => 'john.doe@example.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertSessionHasErrors('password');
        $this->assertGuest();
    }



    // Test logout
    public function test_user_can_logout()
    {
        $user = User::factory()->create([
            'email' => 'john.doe@example.com',
            'password' => Hash::make('password123'),
        ]);

        // Login terlebih dahulu
        $this->actingAs($user);

        // Cek logout
        $response = $this->post(route('logout'));

        $response->assertRedirect(route('login')); // setelah logout, diarahkan ke halaman login
        $this->assertGuest(); // memastikan pengguna sudah logout
    }
}
