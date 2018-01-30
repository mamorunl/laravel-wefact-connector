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
        'Status',
        'Registrar',
        'RegistrarName',
        'HostingID',
        'Subscription',
        'Modified'
    ];
}