<?php

return [
    'ctrl' => [
        'label' => 'from',
        'default_sortby' => 'ORDER BY from',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'title' => 'LLL:EXT:typo3_hyphenator/Resources/Private/Language/locallang_tca.tx_hyphenator_term.xlf:tx_hyphenator_term',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'iconfile' => 'EXT:typo3_hyphenator/Resources/Public/Icons/Extension.svg',
        'searchFields' => 'from',
    ],
    'columns' => [
        'hidden' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
            ],
        ],
        'from' => [
            'label' => 'LLL:EXT:typo3_hyphenator/Resources/Private/Language/locallang_tca.tx_hyphenator_term.xlf:from.label',
            'description' => 'LLL:EXT:typo3_hyphenator/Resources/Private/Language/locallang_tca.tx_hyphenator_term.xlf:from.description',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'eval' => 'trim',
                'max' => 255,
                'required' => true,
            ],
        ],
        'to' => [
            'label' => 'LLL:EXT:typo3_hyphenator/Resources/Private/Language/locallang_tca.tx_hyphenator_term.xlf:to.label',
            'description' => 'LLL:EXT:typo3_hyphenator/Resources/Private/Language/locallang_tca.tx_hyphenator_term.xlf:to.description',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'eval' => 'trim,StraschekIo\Hyphenator\Evaluation\PipeEvaluation',
                'max' => 255,
                'required' => true,
            ],
        ],
    ],
    'types' => [
        '0' => [
            'showitem' => 'hidden, --palette--;;term',
        ],
    ],
    'palettes' => [
        'term' => [
            'showitem' => 'from, to',
        ],
    ],
];
