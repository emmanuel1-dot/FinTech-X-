<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;

class UpdateUserPassword implements UpdatesUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and update the user's password.
     *
     * @param  array<string, string>  $input 
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [    // Validation des données d'entrée pour la mise à jour du mot de passe de l'utilisateur
            'current_password' => ['required', 'string', 'current_password:web'], // Le champ "current_password" est requis, doit être une chaîne de caractères et doit correspondre au mot de passe actuel de l'utilisateur (utilise la règle de validation "current_password" pour vérifier que le mot de passe fourni correspond au mot de passe actuel de l'utilisateur)
            'password' => $this->passwordRules(),  // Le champ "password" doit respecter les règles de validation définies dans le trait PasswordValidationRules
        ], [
            'current_password.current_password' => __('The provided password does not match your current password.'),  // Message d'erreur personnalisé pour la validation du mot de passe actuel ])->validateWithBag('updatePassword'); // Valide les données d'entrée et affiche les erreurs de validation dans un bag d'erreurs nommé "updatePassword"
        ])->validateWithBag('updatePassword'); // Valide les données d'entrée et affiche les erreurs de validation dans un bag d'erreurs nommé "updatePassword"

        $user->forceFill([    // Met à jour le mot de passe de l'utilisateur dans la base de données en utilisant la méthode forceFill pour forcer la mise à jour même si le champ "password" n'est pas modifiable
            'password' => Hash::make($input['password']),  // Le mot de passe est haché avant d'être enregistré dans la base de données pour des raisons de sécurité ])->save(); // Enregistre les modifications apportées à l'utilisateur dans la base de données
        ])->save();
    }
}
