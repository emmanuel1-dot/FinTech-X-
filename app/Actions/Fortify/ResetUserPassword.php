<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\ResetsUserPasswords;

class ResetUserPassword implements ResetsUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and reset the user's forgotten password.
     *
     * @param  array<string, string>  $input
     */
    public function reset(User $user, array $input): void // Valide les données d'entrée pour la réinitialisation du mot de passe de l'utilisateur
    {
        Validator::make($input, [ // Validation des données d'entrée pour la réinitialisation du mot de passe de l'utilisateur
            'password' => $this->passwordRules(),// Le mot de passe doit respecter les règles de validation définies dans le trait PasswordValidationRules
        ])->validate();

        $user->forceFill([ // Met à jour le mot de passe de l'utilisateur dans la base de données en utilisant la méthode forceFill pour forcer la mise à jour même si le champ "password" n'est pas modifiable
            'password' => Hash::make($input['password']), // Le mot de passe est haché avant d'être enregistré dans la base de données pour des raisons de sécurité ])->save(); // Enregistre les modifications apportées à l'utilisateur dans la base de données }
        ])->save();
    }
}
