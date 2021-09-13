<?php

namespace App\Validation;

use App\Models\User;

class Validator {

    private $data;
    private $errors;
    
    public function __construct(array $data) 
    {
        $this->data = $data;
    }
    
    public function validate(array $rules): ?array
    {
        foreach ($rules as $name => $rulesArray) {
            // Checks if the given key or index exists in the array
            if (array_key_exists($name, $this->data)) {
                foreach ($rulesArray as $rule) {
                    switch ($rule) {
                        case 'required':
                            $this->required($name, $this->data[$name]);
                            break;
                        case 'validUsername':
                            $this->validUsername($name, $this->data[$name]);
                            break;
                        case 'validEmail':
                            $this->validEmail($name, $this->data[$name]);
                            break;
                        case 'validPassword':
                            $this->validPassword($name, $this->data[$name]);
                            break;
                        case substr($rule, 0, 3) === 'min' : 
                            $this->min($name, $this->data[$name], $rule);
                        default:
                            # code...
                            break;
                    }
                }
            }
            
        }

        return $this->getErrors();
    }

    private function required(string $name, string $value)
    {
        $value = trim($value);

        if (!isset($value) || is_null($value) || empty($value)) {
            $this->errors[$name][] = "{$name} est requis.";
        }
    }

    private function validUsername(string $name, string $value)
    {
        $value = trim($value);
        
        if (!preg_match("#^[a-zA-Z0-9-_]{3,}$#", $value)) {
            $this->errors[$name][] = "{$name} doit avoir au moins 3 caractéres des lettres des chiffres et - _ .";
            
        }
    }

    private function validEmail(string $name, string $value)
    {
       
        if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,6}$#", $value)) {
            $this->errors[$name][] = "{$name} n'est pas un email valide.";
            
        }
    }

    private function validPassword(string $name, string $value)
    {
       
        if (!preg_match('#^[a-zA-Z0-9-_@%*]{6,}$#', $value)) {
            $this->errors[$name][] = "{$name} doit avoir au moins 6 caractéres des lettres des chiffres et les caractères spéciaux -_@%* .";
            
        }elseif ($this->data['password'] != $this->data['password_confirm']){
            $this->errors[$name][] = 'Vos deux mots de passe ne sont pas identique';
        }
    
    }

    private function min(string $name, string $value, string $rule)
    {
        // we get the minimum number of characters
        preg_match_all('/(\d+)/', $rule, $matches);

        // var_dump((int) $matches[0][0]); die();
        $limit = (int) $matches[0][0];

        if (strlen($value) < $limit) { 
            $this->errors[$name][] = "{$name} doit comprendre un minimum de {$limit} caratères";
        }
    }

    private function getErrors(): ?array
    {
        return $this->errors;
    }
}