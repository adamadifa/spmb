<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaranonline;
use App\Models\Tahunajaran;
use App\Models\Unit;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

use function App\Helpers\buatkode;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $unit = Unit::whereNotIn('kode_unit', ['U00', 'U06', 'U07'])->get();
        return view('auth.register', compact('unit'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Pendaftaranonline::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'jenis_kelamin' => ['required', 'string', 'in:L,P'],
            'no_hp' => ['required', 'string', 'max:15'],
            'kode_unit' => ['required', 'string', 'max:5'],
        ]);

        $ta_aktif = Tahunajaran::where('status', 1)->first();
        $ta_pendaftaran = substr($ta_aktif->tahun_ajaran, 2, 2);
        $lastpendaftaran = Pendaftaranonline::select('no_register')
            ->where('kode_ta', $ta_aktif->kode_ta)
            ->where('kode_unit', $request->kode_unit)
            ->orderBy('no_register', 'desc')
            ->first();
        $last_no_register = $lastpendaftaran != null ? $lastpendaftaran->no_register : '';
        $format = "OL" . $request->kode_unit . $ta_pendaftaran;
        $no_register = buatkode($last_no_register, $format, 3);
        $user = Pendaftaranonline::create([
            'no_register' => $no_register,
            'tanggal_register' => now(),
            'nama_lengkap' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'kode_unit' => $request->kode_unit,
            'kode_ta' => $ta_aktif->kode_ta,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
