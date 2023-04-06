<?php

namespace App\Console\Commands;

use App\Mail\MissYouEmail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendMissYouEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:missyou';

    protected $description = 'Send email notifications to users who didn\'t log in within the past month';

    /**
     * Execute the console command.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
    $threshold = Carbon::now()->subMonth();
    $users = User::where('last_login', '<', $threshold)->get();

    foreach ($users as $user) {
        $url = url('/');
        Mail::to($user->email)->send(new MissYouEmail($user, $url));
    }

    $this->info("Emails sent to " . $users->count() . " users.");
}
}
