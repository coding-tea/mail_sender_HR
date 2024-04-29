<?php

namespace App\Jobs;

use App\Mail\mailSender;
use App\Mail\SendMail;
use App\Models\Message;
use App\Models\SentEmail;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public $email,
        public $category,
        public $message,
    ) {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            Mail::to($this->email)->send(new SendMail(Message::find($this->message)));
            SentEmail::create(["email" => $this->email, "category_id" => $this->category]);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
