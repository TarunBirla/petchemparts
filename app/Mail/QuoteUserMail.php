<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\QuoteRequest;

class QuoteUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $quoteRequest;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(QuoteRequest $quoteRequest)
    {
        $this->quoteRequest = $quoteRequest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your Quote Request Received [' . $this->quoteRequest->quote_no . '] - Petchem Parts')
                    ->view('emails.quote_user');
    }
}
