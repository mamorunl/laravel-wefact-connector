<?php
/**
 * Created by RAPIDE Internet.
 * Author: Bas Hepping <bashepping@rapide.nl>
 * Date: 24-1-2018
 * Time: 15:28
 */

namespace mamorunl\WeFact\Traits;

trait HasAttributes
{
    protected function isFillable($key) {
        if(in_array($key, $this->getFillable())) {
            return true;
        }
    }

    protected function getFillable() {
        return $this->fillable;
    }
}