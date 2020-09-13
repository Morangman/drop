<?php

declare(strict_types = 1);

use Illuminate\Database\Seeder;
use App\Setting;

/**
 * Class SettingSeeder
 */
class SettingSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        Setting::query()->create([
            'general_settings' => [],
            'code_insert' => '',
        ]);
    }
}
