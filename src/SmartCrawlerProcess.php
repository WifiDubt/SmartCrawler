<?php

namespace WifiDubt\SmartCrawler;

use Symfony\Component\DomCrawler\Crawler;

class SmartCrawlerProcess {
    public string $url;
    public array $params = [];
    public string|null $itemId = null;

    public function handle() : array {
        $url = $this->url."?".http_build_query($this->params);

        $html = file_get_contents($url);
        $crawler = new Crawler($html);

        return $this->crawl($crawler);
    }

    public function crawl(Crawler $crawler) : array {
        $items = [];

        if (!empty($this->itemId)) {
            $itemsCrawler = $crawler->filter($this->itemId);
            foreach ($itemsCrawler as $item) {
                $item = new Crawler($item);
                $items[] = $this->crawlItem($item);
            }
        }

        return $items;
    }

    public function crawlItem(Crawler $item) : array {return [];}
}
