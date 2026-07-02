<?php

namespace App\Mail;

use App\Models\Inquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactInquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    public $inquiry;
    public $extraData;
    public $isAdmin;

    /**
     * Create a new message instance.
     */
    public function __construct(Inquiry $inquiry, array $extraData = [], bool $isAdmin = false)
    {
        $this->inquiry = $inquiry;
        $this->extraData = $extraData;
        $this->isAdmin = $isAdmin;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $subject = $this->isAdmin 
            ? "[ALERT] New Contact Inquiry: " . $this->inquiry->name 
            : "We received your message - AI-Solutions";

        $view = $this->isAdmin 
            ? 'emails.contact_admin' 
            : 'emails.contact_user';

        return $this->subject($subject)
                    ->view($view);
    }
}
