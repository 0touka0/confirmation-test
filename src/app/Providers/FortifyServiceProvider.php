<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);

        Fortify::registerView(function () {
            return view('auth.register');
        });

        Fortify::loginView(function () {
            return view('auth.login');
        });

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(10)->by($email . $request->ip());
        });

        //ログイン時のバリデーションルール（フォームリクエストではない）
        Fortify::authenticateUsing(function (Request $request) {
            $validatedData = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            // バリデーションが成功したら認証ロジックを実行
            $user = User::where('email', $validatedData['email'])->first();

            if (
                $user &&
                Hash::check($validatedData['password'], $user->password)
            ) {
                return $user;
            }
        });
    }
}
