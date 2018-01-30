<?php
/**
 * Created by RAPIDE Internet.
 * Author: Bas Hepping <bashepping@rapide.nl>
 * Date: 30-1-2018
 * Time: 16:51
 */

namespace mamorunl\WeFact\Models;

use mamorunl\WeFact\Model;

class Handle extends Model
{
    protected $fillable = [
        'Identifier',
        'Handle',
        'Registrar',
        'RegistrarHandle',
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
        'FaxNumber',
        'Created',
        'Modified',
        'Translations'
    ];
}