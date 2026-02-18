<?php

namespace App\Actions\Fortify;

use Illuminate\Validation\Rules\Password;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array<int, \Illuminate\Contracts\Validation\Rule|array<mixed>|string>
     */
    protected function passwordRules(): array // Règles de validation pour les mots de passe
    {
        return ['required', 'string', Password::default(), 'confirmed'];// Le mot de passe doit être requis, être une chaîne de caractères, respecter les règles de mot de passe par défaut de Laravel et être confirmé (doit correspondre au champ de confirmation)
    }
}
