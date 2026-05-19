<?php

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

/**
 * Register plugins, flexform and remove unused fields
 */
foreach (['list', 'show', 'showbytag', 'intro', 'closure', 'result', 'highscore'] as $plugin) {
    $pluginSignature = ExtensionUtility::registerPlugin(
        'FpMasterquiz',
        ucfirst($plugin),
        'LLL:EXT:fp_masterquiz/Resources/Private/Language/locallang_be.xlf:template.' . $plugin,
        'fp_masterquiz-mod1',
        'Masterquiz',
        'LLL:EXT:fp_masterquiz/Resources/Private/Language/locallang_db.xlf:tx_fp_masterquiz_pi1.description'
    );

    ExtensionManagementUtility::addToAllTCAtypes(
        'tt_content',
        '--div--;Configuration,pi_flexform,pages',
        $pluginSignature,
        'after:subheader'
    );
    ExtensionManagementUtility::addPiFlexFormValue(
        '*',
        'FILE:EXT:fp_masterquiz/Configuration/FlexForms/flexform_pi1.xml',
        $pluginSignature   // = 'fpmasterquiz_' . $plugin
    );
}
