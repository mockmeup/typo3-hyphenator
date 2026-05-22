<?php

declare(strict_types=1);
namespace StraschekIo\Hyphenator\Parser;

class HyphenParser
{
    public function replace(
        array $terms,
        string $content
    ): string {
        $preparedTerms = [];

        foreach ($terms as $term) {
            $preparedTerms[] = [
                'pattern' => '/(?<![\pL\pN])'
                    . preg_quote($term['from'], '/')
                    . '(?![\pL\pN])/u',

                'replacement' => str_replace(
                    '|',
                    "\u{00AD}",
                    strip_tags($term['to'])
                ),
            ];
        }

        $dom = new \DOMDocument();

        libxml_use_internal_errors(true);

        $dom->loadHTML(
            '<?xml encoding="utf-8" ?>' . $content,
            LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
        );

        libxml_clear_errors();

        $xpath = new \DOMXPath($dom);

        $textNodes = $xpath->query(
            '//text()[not(ancestor::head) and not(ancestor::script) and not(ancestor::style)]'
        );

        foreach ($textNodes as $textNode) {
            $text = $textNode->nodeValue;

            foreach ($preparedTerms as $term) {
                $text = preg_replace(
                    $term['pattern'],
                    $term['replacement'],
                    $text
                );
            }

            $textNode->nodeValue = $text;
        }

        return $dom->saveHTML();
    }
}
