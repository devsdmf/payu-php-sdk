<?php

namespace PayU\Entity;

/**
 * Interface EntityInterface
 *
 * Provides a common interface for entities and wrappers that represents an object in API
 *
 * @package PayU\Entity
 * @author Lucas Mendes <devsdmf@gmail.com>
 */
interface EntityInterface
{

    /**
     * Export the entity to array
     *
     * @return array
     */
    public function toArray();
}