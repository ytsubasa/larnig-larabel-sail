<?php

declare(strict_types=1);

namespace App\Auth;

use Illuminate\Contracts\Auth\Authenticatable;

class AuthenticateUser implements Authenticatable
{

    protected $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public function getAuthIdentiferName(): string
    {
        return 'user_id';
    }

    public function getAuthIdentifier()
    {
        return $this->attributes[$this->getAuthIdentifierName()];
    }

    public function getAuthPassword(): string
    {
        return $this->attributes['password'];
    }

    public function getRememberToken($value): string
    {
        return $this->attributes[$this->getRememberTokenName()] = $value;
    }

    public function getRememberTokenName(): string
    {
        return '';
    }
}
