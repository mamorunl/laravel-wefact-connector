<?php
/**
 * Created by RAPIDE Internet.
 * Author: Bas Hepping <bashepping@rapide.nl>
 * Date: 24-1-2018
 * Time: 14:56
 */

namespace mamorunl\WeFact\Models;

use mamorunl\WeFact\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Debtor extends Model implements Authenticatable
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

        $called_class = get_called_class();

        return new $called_class($response['debtor']);
    }

    public function getId()
    {
        return $this->Identifier;
    }

    /**
     * Get the name of the unique identifier for the user.
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return "Identifier";
    }

    /**
     * Get the unique identifier for the user.
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->Identifier;
    }

    /**
     * Get the password for the user.
     * @return string
     */
    public function getAuthPassword()
    {
        // TODO: Implement getAuthPassword() method.
    }

    /**
     * Get the token value for the "remember me" session.
     * @return string
     */
    public function getRememberToken()
    {
        // TODO: Implement getRememberToken() method.
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     *
     * @return void
     */
    public function setRememberToken($value)
    {
        // TODO: Implement setRememberToken() method.
    }

    /**
     * Get the column name for the "remember me" token.
     * @return string
     */
    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }
}