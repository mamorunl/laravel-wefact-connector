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

        $full_class = get_called_class();
        $base_class = explode('\\', $full_class);
        $base_class = end($base_class);

        $data = self::sendRequest(strtolower($base_class), 'show', $params);

        if(!strcmp($data['status'], 'success')) {
            return new $full_class($data[strtolower($base_class)]);
        }

        return null;
    }

    public static function all()
    {
        $params = [
            'limit' => 99999
        ];

        $full_class = get_called_class();
        $base_class = explode('\\', $full_class);
        $base_class = end($base_class);

        $data = self::sendRequest(strtolower($base_class), 'list', $params);

        if(!strcmp($data['status'], 'success')) {
            $classes = [];

            foreach ($data[strtolower($base_class)] as $object) {
                $classes[] = new $full_class($object);
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