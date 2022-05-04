<?php

namespace App\Enums;

enum UserStatus: string
{
    case RICHIEDENTE = 'richiedente';
    case NUOVO = 'nuovo';
    case ATTIVO = 'attivo';
    case RINNOVO = 'rinnovo';
    case RIFIUTATO = 'rifiutato';
}
