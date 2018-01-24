<?php
/**
 * Created by RAPIDE Internet.
 * Author: Bas Hepping <bashepping@rapide.nl>
 * Date: 24-1-2018
 * Time: 14:59
 */

namespace mamorunl\WeFact\Traits;

trait SendRequestTrait
{
    public static function sendRequest($controller, $action, array $params)
    {
        $params['api_key'] = config('wefact.api_key');
        $params['controller'] = $controller;
        $params['action'] = $action;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, config('wefact.url'));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, '10');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));

        $curlResp = curl_exec($ch);
        $curlError = curl_error($ch);

        if ($curlError != '') {
            $result = array(
                'controller' => 'invalid',
                'action'     => 'invalid',
                'status'     => 'error',
                'date'       => date('c'),
                'errors'     => array($curlError)
            );
        } else {
            $result = json_decode($curlResp, true);
        }

        return $result;
    }
}