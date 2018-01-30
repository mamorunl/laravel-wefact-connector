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

    public function __construct(array $params = [])
    {
        $this->fill($params);
    }

    /**
     * Find a specific instance of a given model.
     * This method calls the show method in
     * the WeFact Hosting API.
     *
     * @param $identifier
     *
     * @return null
     */
    public static function find($identifier)
    {
        $params = [
            'Identifier' => $identifier
        ];

        $full_class = get_called_class();
        $base_class = substr(get_called_class(), strrpos(get_called_class(), '\\') + 1);

        $data = self::sendRequest(strtolower($base_class), 'show', $params);

        if (!strcmp($data['status'], 'success')) {
            return new $full_class($data[strtolower($base_class)]);
        }

        return null;
    }

    /**
     * Retrieve all instances of a given model.
     * This method calls the list method in
     * the WeFact Hosting API.
     *
     * @return array|bool
     */
    public static function all()
    {
        $params = [
            'limit' => 99999
        ];

        $full_class = get_called_class();
        $base_class = substr(get_called_class(), strrpos(get_called_class(), '\\') + 1);

        $data = self::sendRequest(strtolower($base_class), 'list', $params);

        if (!strcmp($data['status'], 'success')) {
            $classes = [];

            foreach ($data[str_plural(strtolower($base_class))] as $object) {
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
            if ($this->isFillable($attribute_key)) {
                $this->$attribute_key = $attribute;
            }
        }
    }
}