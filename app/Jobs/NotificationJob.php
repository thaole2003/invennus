<?php

namespace App\Jobs;

use App\Mail\NotificationMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;


class NotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $user;

     protected $content;
    public function __construct($user, $content)
    {
        //
        $this->user = $user;

        $this->content = $content;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        $email = new NotificationMail($this->content);
        Mail::to($this->user['email'])->send($email);
    }
}
