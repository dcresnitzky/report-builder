<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(WebsiteSeeder::class);

        $this->fromSql('reports.sql');
    }

    private function fromSql(string $filename)
    {
        $sql = file_get_contents(database_path() . '/seeds/' . $filename);

        $commands = explode(';', $sql);

        array_pop($commands);

        foreach($commands as $command) {
            DB::statement($command);
        }
    }
}
