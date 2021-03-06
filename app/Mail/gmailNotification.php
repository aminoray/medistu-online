<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class gmailNotification extends Mailable
{
    use Queueable, SerializesModels;

    protected $title;
    protected $text;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $text, $data)
    {
        $this->title = sprintf('%s', $name);
        $this->text = $text;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      if ($this->data == 'contact') {
        return $this->view('emails.contact')
                    ->subject($this->title)
                    ->with([
                        'text' => $this->text,
                        'data' => $this->data,
                      ]);
      } else {
        return $this->view('emails.sample_mail')
                    ->subject($this->title)
                    ->with([
                        'text' => $this->text,
                        'data' => $this->data,
                      ]);
      }

    }
}
