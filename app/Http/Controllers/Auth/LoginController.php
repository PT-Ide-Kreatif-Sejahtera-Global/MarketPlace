<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email'    => 'email|required',
                'password' => 'required|min:8'
            ]);
            
            $credentials = $request->only(['email', 'password']);
            if (!Auth::attempt($credentials)) {
                return redirect()->route('login')
                    ->withErrors(['login' => 'email atau password salah'])
                    ->withInput();
            }

            $user = User::where('email', $request->email)->first();
            if (!Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Invalid Credentials');
            }

            $token = $user->createToken('authToken')->plainTextToken;
            return redirect()->route('admin.dashboard');
        } catch (Exception $error) {
            return redirect()->route('login')
                ->withErrors(['login' => $error->getMessage()])
                ->withInput();
        }
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logged out']);
    }
}
