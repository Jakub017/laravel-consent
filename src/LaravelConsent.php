<?php

namespace Jakub017\LaravelConsent;

class LaravelConsent
{
    protected array $consents = [];

    public function __construct()
    {
        // Check if the cookie exists
        $cookieData = request()->cookie('laravel_consent');

       // If the cookie exists, transform the JSON string into a PHP array
        if($cookieData) {
            $this->consents = json_decode($cookieData, true) ?? [];
        }
    }

    public function getAllConsents(): array
    {
        return $this->consents;
    }

    public function getAvailableCategories(): array
    {
        return config('laravel-consent.categories', []);
    }

    public function giveConsent(string $category): void
    {
        $this->consents[$category] = true;

        /* 
        Save the consents to a cookie, encode it to a strin in a JSON format for JS requirements
        Store consent for 1 year
        */
        cookie()->queue('laravel_consent', json_encode($this->consents), config('laravel-consent.cookie_default_time', 525600)); 
    }

    public function acceptAll(array $categories): void
    {
        // Set every consent category for true
        foreach($categories as $category) {
            $this->consents[$category] = true;
        }

        // Send cookie with all consents to the browser
        cookie()->queue('laravel_consent', json_encode($this->consents), config('laravel-consent.cookie_default_time', 525600));
    }

    public function checkConsent(string $category): bool
    {
        if($category === 'necessary') {
            return true;
        }

        return $this->consents[$category] ?? false;
    }

    public function removeConsent(string $category): void
    {
        // Remove the consent from array
        unset($this->consents[$category]);

        // Send updated cookie without the consent which user has removed
        cookie()->queue('laravel_consent', json_encode($this->consents),config('laravel-consent.cookie_default_time', 525600));
    }
}
