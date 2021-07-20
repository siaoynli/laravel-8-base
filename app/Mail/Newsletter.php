<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Newsletter extends Mailable implements  ShouldQueue
{
    use Queueable, SerializesModels;

    protected $posts;
    protected $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($posts, $email)
    {
        $this->posts = $posts;
        $this->email = $email;
    }

    /**
     * @return Newsletter
     */
    public function build():Newsletter
    {
        return $this->from('hello@app.com', config('app.name', 'Laravel'))
            ->subject(__('newsletter.email.subject'))
            ->view('emails.newsletter')
            ->with([
                'posts' => $this->posts,
                'email' => $this->email
            ]);
    }
}
