<?php

namespace Jakub017\LaravelConsent;

class LaravelConsent
{
    protected array $consents = [];

    public function giveConsent(string $category): void
    {
        $this->consents[$category] = true;
    }

    public function chceckConsent(string $category): bool
    {
        return $this->consents[$category] ?? false;
    }
}
