<?php
/**
 * Created by RAPIDE Internet.
 * Author: Bas Hepping <bashepping@rapide.nl>
 * Date: 24-1-2018
 * Time: 14:56
 */

namespace mamorunl\WeFact\Models;

use mamorunl\WeFact\Model;

class Debtor extends Model
{
    protected $fillable = [
        'Identifier',
        'DebtorCode',
        'CompanyName',
        'CompanyNumber',
        'LegalForm',
        'TaxNumber',
        'Sex',
        'Initials',
        'SurName',
        'Address',
        'ZipCode',
        'City',
        'Country',
        'EmailAddress',
        'PhoneNumber',
        'MobileNumber',
        'FaxNumber',
        'Website',
        'Comment',
        'InvoiceMethod',
        'InvoiceCompanyName',
        'InvoiceSex',
        'InvoiceInitials',
        'InvoiceSurName',
        'InvoiceAddress',
        'InvoiceZipCode',
        'InvoiceCity',
        'InvoiceEmailAddress',
        'InvoiceAuthorisation',
        'InvoiceDataForPriceQuote',
        'AccountNumber',
        'AccountBIC',
        'AccountName',
        'AccountBank',
        'AccountCity',
        'ActiveLogin',
        'Username',
        'Mailing',
        'Taxable',
        'PeriodicInvoiceDays',
        'InvoiceTemplate',
        'PriceQuoteTemplate',
        'ReminderTemplate',
        'SecondReminderTemplate',
        'SummationTemplate',
        'PaymentMail',
        'PaymentMailTemplate',
        'InvoiceCollect',
        'DefaultLanguage',
        'ClientareaProfile',
        'Server',
        'Created',
        'Modified',
        'Groups',
        'CustomFields'
    ];

    public function __construct(array $params = [])
    {
        $this->fill($params);
    }

    /**
     * @param $username
     * @param $password
     *
     * @return \mamorunl\WeFact\Models\Debtor|null
     */
    public static function checkLogin($username, $password)
    {
        if(!isset($username) || !isset($password)) {
            return null;
        }

        $params = [
            'Username' => $username,
            'Password' => $password
        ];

        $response = self::sendRequest('debtor', 'checkLogin', $params);

        if($response['status'] != 'success') {
            return null;
        }

        return new Debtor($response['debtor']);
    }

    public function getId()
    {
        return $this->Identifier;
    }
}