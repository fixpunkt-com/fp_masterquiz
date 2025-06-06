<?php

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') || die();

call_user_func(
    function()
    {

        ExtensionUtility::configurePlugin(
            'FpMasterquiz',
            'List',
            [
                \Fixpunkt\FpMasterquiz\Controller\QuizController::class => 'list, show, showAjax'
            ],
            [
                \Fixpunkt\FpMasterquiz\Controller\QuizController::class => 'show, showAjax'
            ],
            ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
        );
        ExtensionUtility::configurePlugin(
            'FpMasterquiz',
            'Show',
            [
                \Fixpunkt\FpMasterquiz\Controller\QuizController::class => 'show, showAjax'
            ],
            [
                \Fixpunkt\FpMasterquiz\Controller\QuizController::class => 'show, showAjax'
            ],
            ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
        );
        ExtensionUtility::configurePlugin(
            'FpMasterquiz',
            'Showbytag',
            [
                \Fixpunkt\FpMasterquiz\Controller\QuizController::class => 'showByTag'
            ],
            [
                \Fixpunkt\FpMasterquiz\Controller\QuizController::class => 'showByTag'
            ],
            ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
        );
        ExtensionUtility::configurePlugin(
            'FpMasterquiz',
            'Intro',
            [
                \Fixpunkt\FpMasterquiz\Controller\QuizController::class => 'intro, show, showAjax, showByTag'
            ],
            [
                \Fixpunkt\FpMasterquiz\Controller\QuizController::class => 'show, showAjax, showByTag'
            ],
            ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
        );
        ExtensionUtility::configurePlugin(
            'FpMasterquiz',
            'Closure',
            [
                \Fixpunkt\FpMasterquiz\Controller\QuizController::class => 'closure'
            ],
            [
                \Fixpunkt\FpMasterquiz\Controller\QuizController::class => 'closure'
            ],
            ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
        );
        ExtensionUtility::configurePlugin(
            'FpMasterquiz',
            'Result',
            [
                \Fixpunkt\FpMasterquiz\Controller\QuizController::class => 'result'
            ],
            [
                \Fixpunkt\FpMasterquiz\Controller\QuizController::class => 'result'
            ],
            ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
        );
        ExtensionUtility::configurePlugin(
            'FpMasterquiz',
            'Highscore',
            [
                \Fixpunkt\FpMasterquiz\Controller\QuizController::class => 'highscore'
            ],
            [
                \Fixpunkt\FpMasterquiz\Controller\QuizController::class => 'highscore'
            ],
            ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
        );

        // register statistics tables for garbage collection
        // see https://docs.typo3.org/c/typo3/cms-scheduler/main/en-us/Installation/BaseTasks/Index.html#table-garbage-collection-task-example
        if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('scheduler')) {
            // Add deletion task (sheduler)
            $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][\Fixpunkt\FpMasterquiz\Task\DeleteParticipantTask::class] = [
                'extension' => 'fp_masterquiz',
                'title' => 'LLL:EXT:fp_masterquiz/Resources/Private/Language/locallang_be.xlf:tasks.title',
                'description' => 'LLL:EXT:fp_masterquiz/Resources/Private/Language/locallang_be.xlf:tasks.description',
                'additionalFields' => \Fixpunkt\FpMasterquiz\Task\DeleteParticipantAdditionalFieldProvider::class
            ];
            // CSV-export task
            $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][\Fixpunkt\FpMasterquiz\Task\CsvExportTask::class] = [
                'extension' => 'fp_masterquiz',
                'title' => 'LLL:EXT:fp_masterquiz/Resources/Private/Language/locallang_be.xlf:tasks.exportTitle',
                'description' => 'LLL:EXT:fp_masterquiz/Resources/Private/Language/locallang_be.xlf:tasks.exportDescription',
                'additionalFields' => \Fixpunkt\FpMasterquiz\Task\CsvExportAdditionalFieldProvider::class
            ];
        }
        // Custom Logger
        $GLOBALS['TYPO3_CONF_VARS']['LOG']['Fixpunkt']['FpMasterquiz']['Controller']['writerConfiguration'] = [
            // Configuration including all levels with higher severity
            \Psr\Log\LogLevel::DEBUG => [
                \TYPO3\CMS\Core\Log\Writer\FileWriter::class => [
                    'logFileInfix' => 'fpmasterquiz',
                ],
            ],
        ];

        $configurationUtility = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Configuration\ExtensionConfiguration::class)->get('fp_masterquiz');
        $addToExcludedParameters = (bool)$configurationUtility['addToExcludedParameters'];
        if ($addToExcludedParameters) {
            // Exclude fpmasterquiz_show and other parameters from cacheHash calculation
            $GLOBALS['TYPO3_CONF_VARS']['FE']['cacheHash']['excludedParameters'] = array_merge(
                $GLOBALS['TYPO3_CONF_VARS']['FE']['cacheHash']['excludedParameters'],
                ['^tx_fpmasterquiz_show', '^answer', '^quest', '_']
            );
        }
    }
);
