<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\HRPerson;
use App\EmployeeTasks;
use App\CompanyIdentity;

use Illuminate\Support\Facades\Storage;

class NextTaskNotifications extends Mailable
{
    use Queueable, SerializesModels;

	public $firstname;
	public $surname;
    public $email
	public $urls = '/';

    public function __construct($firstname, $surname, $email)
    {
        $this->firstname = $firstname;
        $this->surname = $surname;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		$companyDetails = CompanyIdentity::systemSettings();
        $companyName = $companyDetails['company_name'];

		//Should get these details from setup
        $subject = "Task completed $companyName online system.";

        $data['support_email'] = $companyDetails['support_email'];
        $data['company_name'] = $companyDetails['full_company_name'] ;
        $data['company_logo'] = url('/') . $companyDetails['company_logo_url'];

        return $this->view('mails.employeeNextTasks')
            ->from($companyDetails['mailing_address'], $companyDetails['mailing_name'])
            ->subject($subject)
            ->with($data);
    }
}
