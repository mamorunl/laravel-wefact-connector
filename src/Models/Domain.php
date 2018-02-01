<?php
/**
 * Created by RAPIDE Internet.
 * Author: Bas Hepping <bashepping@rapide.nl>
 * Date: 30-1-2018
 * Time: 14:52
 */

namespace mamorunl\WeFact\Models;

use mamorunl\WeFact\Model;

class Domain extends Model
{
    protected $fillable = [
        'Identifier',
        'Domain',
        'Tld',
        'RegistrationDate',
        'ExpirationDate',
        'Debtor',
        'DNS1',
        'DNS2',
        'DNS3',
        'DNSTemplate',
        'OwnerHandle',
        'AdminHandle',
        'TechHandle',
        'DomainAutoRenew',
        'Comment',
        'Status',
        'Registrar',
        'RegistrarName',
        'RegistrarInfo',
        'HostingID',
        'Subscription',
        'Modified',
        'Translations'
    ];

    /**
     * Update WhoIS data on WeFact
     *
     * @param $whois_data
     *
     * @return bool
     */
    public function edit_whois($whois_data)
    {
        $base_class = substr(get_called_class(), strrpos(get_called_class(), '\\') + 1);

        $data = self::sendRequest(strtolower($base_class), 'editwhois', $whois_data);

        if (!strcmp($data['status'], 'success')) {
            return true;
        }

        return false;
    }
}