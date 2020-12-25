<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('news')
            ->insert($this->generateData());
    }

    protected function generateData(): array
    {
        $data = [];
        $data[] = [
            'title' => 'Test News' . uniqid(),
            'description' => 'Test News',
            'source' => 'yandex',
            'publish_date' => date('Y-m-d')
        ];
        return $data;
    }
}
