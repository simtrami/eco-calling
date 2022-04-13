<?php

namespace App\Console\Commands;

use App\Events\Signed;
use App\Models\Signature;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;

class ResendVerificationEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'signatures:resend-email
    {emails?* : (optional) Filter on a list of emails}
    {--A|after= : (Y-m-d) Filter to signatures created after this date}
    {--B|before= : (Y-m-d) Filter to signatures created before this date}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Re-send the email notification to validate the signature associated with the given email,
    if it has not been verified yet. With no parameter, sends the email to all pending signatures.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        /** @var Builder $pending */
        $pending = Signature::pending();
        $nb = $pending->count();
        if ($nb < 1) {
            $this->info("There is no pending signatures.");
            return 0;
        }

        if ($this->option('after')) {
            $filtered = $pending->where('created_at', '>', $this->option('after'));
        }
        if ($this->option('before')) {
            $filtered = $pending->where('created_at', '<', $this->option('before'));
        }
        if (isset($filtered)) {
            $nb = $filtered->count();
            if ($nb < 1) {
                $this->info("There is no pending signatures which was created in this time slot.");
                return 0;
            }
        } else {
            $filtered = $pending;
        }

        if ($this->argument('emails')) {
            $filtered = $filtered->whereIn('email', $this->argument('emails'));
            $nb = $filtered->count();
            if ($nb < 1) {
                $this->error("The given emails are invalid, do not exist in database or are already confirmed.");
                return 1;
            }
        }

        $time = $this->calculateTime($nb);
        if ($this->confirm("There are {$nb} pending signatures, the process should take {$time},\n do you want to send a new notification to all of them?")) {
            $this->resendEmails($filtered);
            $this->info("Done.");
        } else {
            $this->info("The operation was cancelled.");
        }
        return 0;
    }

    private function calculateTime($nb): string
    {
        $s = $nb * 3 + floor($nb / 29) - 3;
        $mn = floor($s / 60);
        $h = floor($mn / 60);
        return (int)$h . 'h ' . (int)($mn - $h * 60) . 'mn ' . (int)($s - $mn * 60) . 's';
    }

    /**
     * @param Signature|Builder $signaturesFiltered
     * @return void
     */
    private function resendEmails(Signature|Builder $signaturesFiltered): void
    {
        $signatures = $signaturesFiltered->get();
        $i = 0;
        $max = count($signatures);
        foreach ($signatures as $signature) {
            $i++;
            if ($i % 30 === 0) {
                $this->info("{$i}: Thirty notifications were sent, waiting 1mn...");
                sleep(60);
            }
            event(new Signed($signature));
            $this->info("{$i}: A new notification was sent to {$signature->email}.");
            if ($i < $max) {
                sleep(3);
                $this->info("Waiting 3s...");
            }
        }
    }
}
