<?php

//autor: Erick Landaverde
//fecha: 11/10/2025
//descripcion: Clase para cargar variables de entorno desde un archivo .env

class EnvLoader {
    public static function load($rutaEnv) {
        if (!file_exists($rutaEnv)) {
            throw new Exception("Archivo .env no encontrado: $rutaEnv");
        }

        $lines = file($rutaEnv, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        
        foreach ($lines as $var) {
            // Ignorar comentarios
            if (strpos(trim($var), '#') === 0) {
                continue;
            }

            // Parsear variable
            if (strpos($var, '=') !== false) {
                list($key, $value) = explode('=', $var, 2);
                $key = trim($key);
                $value = trim($value);
                
                // Remover comillas si existen
                if ((strpos($value, '"') === 0 && strrpos($value, '"') === strlen($value) - 1) ||
                    (strpos($value, "'") === 0 && strrpos($value, "'") === strlen($value) - 1)) {
                    $value = substr($value, 1, -1);
                }
                
                $_ENV[$key] = $value;
                putenv("$key=$value");
            }
        }
    }

    public static function get($key, $default = null) {
        return $_ENV[$key] ?? getenv($key) ?: $default;
    }
}
