<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Page as BasePage;

abstract class Page extends BasePage
{
    /**
     * Get the global element shortcuts for the site.
     *
     * @return array
     */
    public static function siteElements()
    {
        return [
            '@app-logo' => '#app-logo',
            '@login-link' => '#login-link',
            '@register-link' => '#register-link', // This link does not appear on the main page
            '@help-link' => '#help-link',
            '@account-link' => '#account-link',
        ];
    }
}
