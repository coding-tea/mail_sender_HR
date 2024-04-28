<?php

namespace src\Domain\Services;

class Service
{
    /***
     * @return array
     */
    public function toArray(): array
    {
        return array_filter(get_object_vars($this));
    }

}
