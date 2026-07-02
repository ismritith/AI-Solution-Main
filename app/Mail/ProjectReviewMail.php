<?php

namespace App\Mail;

use App\Models\ProjectReview;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProjectReviewMail extends Mailable
{
    use Queueable, SerializesModels;

    public $review;
    public $isAdmin;

    /**
     * Create a new message instance.
     */
    public function __construct(ProjectReview $review, bool $isAdmin = false)
    {
        $this->review = $review;
        $this->isAdmin = $isAdmin;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $projectTitle = $this->review->project->title ?? 'Project Node';
        $subject = $this->isAdmin 
            ? "[ALERT] New Project Review: " . $projectTitle
            : "Review Submitted - " . $projectTitle;

        $view = $this->isAdmin 
            ? 'emails.review_admin' 
            : 'emails.review_user';

        return $this->subject($subject)
                    ->view($view);
    }
}
