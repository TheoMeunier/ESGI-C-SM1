<?php

namespace App\Form\Auth;

class RegisterType
{
    public function getConfig(): array
    {
        return [
            'config' => [
                'method' => 'POST',
                'action' => '',
                'submit' => "S'inscrire",
                'class'  => 'form',
            ],
            'inputs' => [
                'firstname' => [
                    'type'        => 'text',
                    'class'       => 'input-form',
                    'placeholder' => 'prénom',
                    'minlen'      => 2,
                    'required'    => true,
                    'error'       => 'Le prénom doit faire plus de 2 caractères'],

                'lastname' => [
                    'type'        => 'text',
                    'class'       => 'input-form',
                    'placeholder' => 'nom',
                    'minlen'      => 2,
                    'required'    => true,
                    'error'       => 'Le nom doit faire plus de 2 caractères'],

                'email' => [
                    'type'        => 'email',
                    'class'       => 'input-form',
                    'placeholder' => 'email',
                    'required'    => true,
                    'error'       => "Le format de l'email est incorrect"],

                'password' => [
                    'type'        => 'password',
                    'class'       => 'input-form',
                    'placeholder' => 'mot de passe',
                    'required'    => true,
                    'error'       => 'Votre mot de passe doit faire plus de 8 caractères avec minuscule et chiffre'],

                'password_confirmation' => [
                    'type'        => 'password',
                    'class'       => 'input-form',
                    'confirm'     => 'password',
                    'placeholder' => 'confirmation',
                    'required'    => true,
                    'error'       => 'Votre mot de passe de confirmation ne correspond pas'],
            ],
        ];
    }
}