<?php

namespace src\Domain\DTOs;

class DTO
{
    /***
     * @return array
     */
    public function toArray(): array
    {
        return array_filter(get_object_vars($this));
    }

}
