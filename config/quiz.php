<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Bandeiras do Quiz
    |--------------------------------------------------------------------------
    |
    | Identificadores (id) para se referenciar a bandeira
    |
    */

    'flags' => [1, 2, 3, 4, 5],

    /*
    |--------------------------------------------------------------------------
    | Alternativas para cada bandeira
    |--------------------------------------------------------------------------
    |
    | O indíce se refere ao identificador de cada bandeira
    |
    */

    'alternatives' => [
        1 => [
            "Coréia do Sul",
            "Arábia Saudita",
            "Costa Rica",
            "Senegal"
        ],

        2 => [
            "Polônia",
            "Nigéria",
            "Brasil",
            "Espanha"
        ],

        3 => [
            "Portugal",
            "Marrocos",
            "Espanha",
            "Islândia"
        ],

        4 => [
            "Costa Rica",
            "Senegal",
            "Marrocos",
            "Colômbia"
        ],

        5 => [
            "Peru",
            "Alemanha",
            "Costa Rica",
            "Croácia"
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Respostas corretas de cada alternativa
    |--------------------------------------------------------------------------
    |
    | O indíce se refere ao identificador de cada bandeira
    | O valor se refere ao indíce de cada alternativa (Atribuido automaticamente)
    |
    */

    'answers' => [
        1 => 3,
        2 => 1,
        3 => 2,
        4 => 0,
        5 => 1,
    ],

    /*
    |--------------------------------------------------------------------------
    | Última etapa do Quiz (Bandeira)
    |--------------------------------------------------------------------------
    |
    */
    'last_step' => 5,

];
