<?php

class WebsiteSeeder extends DatabaseSeeder
{
    public function run()
    {
        factory(App\Models\Website::class, 100)->create();
    }
}
