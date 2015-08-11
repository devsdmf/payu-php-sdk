<?php

namespace PayU\Environment;

interface EnvironmentInterface
{

    public function getUrl($context);

    public function isTest();

    public function getHeaders();

    public function getOptions();

    public function __toString();
}