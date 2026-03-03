<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserFeedback extends Mailable
{


    use Queueable, SerializesModels;

    protected $user;
    protected $feedback;
    protected $type;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $feedback, $type = 'enquiry')
    {
        $this->user = $user;
        $this->feedback = $feedback;
        $this->type = $type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = $this->type == 'enquiry' ? "Enquiry Message" : "User Feedback";
        return $this->subject($subject)
                    ->view('email.user_feedback')
                    // ->text('emails.user_feedback')
                    ->with([
                        'user' => $this->user,
                        'feedback' => $this->feedback
                    ]);
    }
}
