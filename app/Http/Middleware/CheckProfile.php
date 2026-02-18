<?php
/// This file is part of the Miniblog project.
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response 
    // Vérifie si l'utilisateur authentifié a le rôle spécifié, sinon redirige vers la page d'accueil
    {
        if($request->user()->role !== $role){ 
            // Vérifie si le rôle de l'utilisateur authentifié ne correspond pas au rôle spécifié
            return redirect('/'); 
            // Redirige vers la page d'accueil si l'utilisateur n'a pas le rôle requis
        }
        return $next($request);
         // Passe la requête au middleware suivant si l'utilisateur a le rôle requis
    }
}
