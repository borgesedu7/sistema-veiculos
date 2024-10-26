<?php

return [
    'paths' => ['api/*'], // ou qualquer outro caminho que você precisa permitir
    'allowed_methods' => ['*'], // Permitir todos os métodos HTTP
    'allowed_origins' => ['*'], // Altere para a porta que você está usando
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'], // Permitir todos os cabeçalhos
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false, // Altere para true se você precisar de credenciais (como cookies)
];
