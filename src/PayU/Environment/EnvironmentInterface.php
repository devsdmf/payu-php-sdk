<?php

namespace PayU\Environment;

/**
 * Interface EnvironmentInterface
 *
 * Define and provide methods to environment object implementations
 *
 * @package PayU\Environment
 * @author Lucas Mendes <devsdmf@gmail.com>
 */
interface EnvironmentInterface
{

    /**
     * Get the environment request URI based on context
     *
     * @param $context
     * @return string
     */
    public function getUrl($context);

    /**
     * Check if is a test environment
     *
     * @return bool
     */
    public function isTest();

    /**
     * Get the environment HTTP headers
     *
     * @return array
     */
    public function getHeaders();

    /**
     * Get the Guzzle Http Client options
     *
     * @return array
     */
    public function getOptions();

    /**
     * Export the environment to string
     *
     * @return string
     */
    public function __toString();
}