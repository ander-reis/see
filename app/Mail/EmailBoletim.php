<?php

namespace See\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use See\Models\TbEmailSee;

class EmailBoletim extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var TbEmailSee
     */
    public $tbEmailSee;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(TbEmailSee $tbEmailSee)
    {
        $this->tbEmailSee = $tbEmailSee;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.boletim');
    }
}
