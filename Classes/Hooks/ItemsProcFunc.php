<?php

namespace Fixpunkt\FpMasterquiz\Hooks;

use Fixpunkt\FpMasterquiz\Utility\TemplateLayout;
use TYPO3\CMS\Backend\Utility\BackendUtility as BackendUtilityCore;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Userfunc: Individuelles...
 *
 * @package fp_masterquiz
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class ItemsProcFunc
{

    /**
     * Itemsproc for templateLayouts
     *
     * @param array &$config configuration array
     * @return void
     */
    public function user_templateLayout(array &$config): void
    {
        $row = BackendUtilityCore::getRecord('tt_content', $config['row']['uid']);
        $pid = $row['pid'] ?? 0;
        
        $templateLayoutsUtility = GeneralUtility::makeInstance(TemplateLayout::class);
        $templateLayouts = $templateLayoutsUtility->getAvailableTemplateLayouts($pid);
        foreach ($templateLayouts as $layout) {
            if (isset($GLOBALS['LANG']->sL)) {
                $text = $GLOBALS['LANG']->sL($layout[0]);
            } else {
                $text = $layout[0];
            }
            $additionalLayout = [
                htmlspecialchars((string) $text),
                $layout[1]
            ];
            $config['items'][] = $additionalLayout;
        }
    }
}
