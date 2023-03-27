<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Admin İn the Database';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        User::create([
            'name' => 'Mine',
            'surname' => 'CEYHAN',
            'email' => 'ceyhanmine082@gmail.com',
            'password' => bcrypt('qwe123123'),
            'type' => 1,
        ]);
    }
}
