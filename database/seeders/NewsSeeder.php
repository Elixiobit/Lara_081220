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
        for ($i = 0; $i < 10; $i++) {
        \DB::table('news')
            ->insert($this->generateData());
        }
    }

    protected function generateData(): array
    {
        $data = [];
        $data[] = [
            'title' => 'Test News' . uniqid(),
            'description' => 'Test News',
            'source' => 'yandex',
            'publish_date' => date('Y-m-d'),
            'category_id' => (int) rand(1, 4),
        ];
        return $data;
    }
}
