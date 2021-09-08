<?php

namespace App\Validation;

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