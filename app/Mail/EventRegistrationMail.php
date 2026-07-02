<?php

namespace App\Mail;

use App\Models\Registration;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventRegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $registration;
    public $isAdmin;

    /**
     * Create a new message instance.
     */
    public function __construct(Registration $registration, bool $isAdmin = false)
    {
        $this->registration = $registration;
        $this->isAdmin = $isAdmin;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $subject = $this->isAdmin 
            ? "[ALERT] New Event Registration for: " . $this->registration->event_name 
            : "Event Registration Confirmed - " . $this->registration->event_name;

        $view = $this->isAdmin 
            ? 'emails.registration_admin' 
            : 'emails.registration_user';

        return $this->subject($subject)
                    ->view($view);
    }
}
