<?php

namespace App\Providers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use Illuminate\Support\Facades\RateLimiter;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\LogoutResponse;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;
use view;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    public function register(): void 
    {
        // Customiser la redirection après la déconnexion
        $this->app->instance(LogoutResponse::class, new class implements LogoutResponse {
            public function toResponse($request)
            {
                return redirect('/login');
            }
        });
        $this->app->instance(LoginResponse::class, new class implements LoginResponse {
            public function toResponse($request)
            
            {   
                $user = $request->user(); 
                // Récupère l'utilisateur authentifié à partir de la requête
                if ($user->role=== 'admin') { 

                    // Vérifie si le rôle de l'utilisateur est "admin"    
                    return redirect('/admin/dashboard'); 
                    
                    // Redirige vers le tableau de bord de l'a dministrateur si l'utilisateur est un administrateur } elseif ($user->role === 'vendeur') { // Vérifie si le rôle de l'utilisateur est "vendeur" return redirect('/vendeurs/index'); // Redirige vers la page d'accueil du vendeur si l'utilisateur est un vendeur
                } elseif ($user->role === 'client') { 

                    // Vérifie si le rôle de l'utilisateur est "client"
                    return redirect('/clients/index'); 
                    // Redirige vers la page d'accueil du client si l'utilisateur est un client
                }
                return redirect('/');
            }
        });
    }





    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        Fortify::redirectUserForTwoFactorAuthenticationUsing(RedirectIfTwoFactorAuthenticatable::class);

        fortify::loginView(function () { // Affiche la vue de connexion personnalisée
            return view('auth.login'); // Affiche la vue "login" située dans le dossier "auth"
        });

        fortify::registerView(function () { // Affiche la vue d'inscription personnalisée
            return view('auth.register');// Affiche la vue "register" située dans le dossier "auth"
        });

        RateLimiter::for('login', function (Request $request) { // Limite le nombre de tentatives de connexion pour un utilisateur donné et une adresse IP donnée afin de prévenir les attaques par force brute
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())) . '|' . $request->ip()); // Génère une clé de limitation basée sur le nom d'utilisateur et l'adresse IP de la requête, en les convertissant en minuscules et en les translittérant pour éviter les problèmes de caractères spéciaux

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
