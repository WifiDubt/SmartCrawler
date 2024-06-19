<?php

namespace WifiDubt\SmartCrawler;

class SmartCrawler {
    public function __construct(
        public SmartCrawlerProcess $processingClass
    ) {
        $this->processingClass->handle();
    }
}
