<?php

namespace See\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
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
    public function __construct(array $data)
    {
        $this->tbEmailSee = $data;
    }
    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->tbEmailSee['teste_see_ds_de'])->subject($this->tbEmailSee['teste_see_ds_assunto'])->view('email.boletim');
    }
}
