<?php

namespace App\Mail;

use App\CompanyIdentity;
use App\HRPerson;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RemovedFromThreeSixty extends Mailable
{
    use Queueable, SerializesModels;

    public $appraiser;
    public $appraisedPerson;
    public $appraisalMonth;
    public $appraisalLink;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(HRPerson $appraiser,HRPerson $appraisedPerson, $appraisalMonth)
    {
        $this->appraiser = $appraiser;
        $this->appraisedPerson = $appraisedPerson;
        $this->appraisalMonth = $appraisalMonth;
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
        $subject = "You Have Been Removed From a 360 Appraisal Group.";

        $data['support_email'] = $companyDetails['support_email'];
        $data['company_name'] = $companyName;
        $data['full_company_name'] = $companyDetails['full_company_name'];
        $data['company_logo'] = url('/') . $companyDetails['company_logo_url'];

        return $this->view('mails.removed_from_three_sixty')
            ->from($companyDetails['mailing_address'], $companyDetails['mailing_name'])
            ->subject($subject)
            ->with($data);
    }
}
