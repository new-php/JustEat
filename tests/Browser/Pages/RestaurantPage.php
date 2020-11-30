<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class RestaurantPage extends Page
{

    protected $restaurant_id;
 
     public function __construct($restaurant_id){
            $this->restaurant_id = $restaurant_id;
     }


    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/restaurants/' .$this->restaurant_id;
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url());
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@element' => '#selector',
        ];
    }
}
