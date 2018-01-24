<?php
/**
 * Created by RAPIDE Internet.
 * Author: Bas Hepping <bashepping@rapide.nl>
 * Date: 24-1-2018
 * Time: 14:36
 */

namespace mamorunl\WeFact;

use mamorunl\WeFact\Traits\HasAttributes;
use mamorunl\WeFact\Traits\SendRequestTrait;

class Model
{
    use SendRequestTrait,
        HasAttributes;

    public static function find($identifier)
    {
        $params = [
            'Identifier' => $identifier
        ];

        $data = self::sendRequest(strtolower(get_called_class()), 'show', $params);

        if(!strcmp($data['status'], 'success')) {
            $called_class = get_called_class();
            return new $called_class($data[strtolower($called_class)]);
        }

        return false;
    }

    public static function all()
    {
        $params = [
            'limit' => 99999
        ];

        $called_class = get_called_class();

        $data = self::sendRequest(strtolower($called_class), 'list', $params);

        if(!strcmp($data['status'], 'success')) {
            $classes = [];

            foreach ($data[strtolower($called_class)] as $object) {
                $classes[] = new $called_class($object);
            }

            return $classes;
        }

        return false;
    }

    public static function where($key, $value)
    {
        //
    }

    public function fill(array $attributes)
    {
        foreach ($attributes as $attribute_key => $attribute) {
            if($this->isFillable($attribute_key)) {
                $this->$attribute_key = $attribute;
            }
        }
    }
}