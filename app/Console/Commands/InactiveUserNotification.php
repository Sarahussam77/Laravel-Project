<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class InactiveUserNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:inactive-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Email inactive users';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $users = User::where('last_login_at', '<', now()->subMonth())->get();
        $inactive_user = User::where('last_login', '<', $users)->get();
        foreach ($inactive_user as $userClient) {
            $user = $userClient->type;
            $user->alterUser();
        }
    }
}
