<?php

namespace Fixpunkt\FpMasterquiz\Controller;

use Fixpunkt\FpMasterquiz\Domain\Repository\QuestionRepository;
use Fixpunkt\FpMasterquiz\Domain\Model\Quiz;
use Fixpunkt\FpMasterquiz\Domain\Model\Question;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Localization\LanguageService;
use TYPO3\CMS\Backend\Template\ModuleTemplate;
use TYPO3\CMS\Backend\Template\ModuleTemplateFactory;

/***
 *
 * This file is part of the "Master-Quiz" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2019 Kurt Gusbeth <k.gusbeth@fixpunkt.com>, fixpunkt werbeagentur gmbh
 *
 ***/

/**
 * QuestionController
 */
class QuestionController extends ActionController
{
    protected int $id;

    protected ModuleTemplate $moduleTemplate;

    /**
     * questionRepository
     *
     * @var QuestionRepository
     */
    protected $questionRepository;

    public function __construct(
        protected readonly ModuleTemplateFactory $moduleTemplateFactory, QuestionRepository $questionRepository
    ) {
        $this->questionRepository = $questionRepository;
    }

    public function initializeAction(): void
    {
        $this->id = (int)($this->request->getQueryParams()['id'] ?? 0);
        $this->moduleTemplate = $this->moduleTemplateFactory->create($this->request);
    }

    /**
     * action move
     */
    public function moveAction(Quiz $quiz, ?Question $question = NULL): ResponseInterface
    {
        $pid = $this->id;
        if ($question instanceof Question) {
            $this->questionRepository->moveToQuiz($question->getUid(), $quiz->getUid());
        }

        $questions = $this->questionRepository->findOtherThan($pid, $quiz->getUid());
        $this->moduleTemplate->assign('question', $question);
        $this->moduleTemplate->assign('questions', $questions);
        $this->moduleTemplate->assign('quiz', $quiz);
        $this->addDocHeaderDropDown('index');
        return $this->moduleTemplate->renderResponse('Question/Move');
    }

    /*
    * Fürs Backend-Modul
    */
    protected function getLanguageService(): LanguageService
    {
        return $GLOBALS['LANG'];
    }

    protected function addDocHeaderDropDown(string $currentAction): void
    {
        $languageService = $this->getLanguageService();
        $actionMenu = $this->moduleTemplate->getDocHeaderComponent()->getMenuRegistry()->makeMenu();
        $actionMenu->setIdentifier('masterquizSelector');

        $actions = ['Quiz,index', 'Participant,list'];
        foreach ($actions as $controller_action_string) {
            $controller_action_array = explode(",", $controller_action_string);
            $actionMenu->addMenuItem(
                $actionMenu->makeMenuItem()
                    ->setTitle($languageService->sL(
                        'LLL:EXT:fp_masterquiz/Resources/Private/Language/locallang_mod1.xlf:index.' .
                        strtolower($controller_action_array[0])
                    ))
                    ->setHref($this->getModuleUri($controller_action_array[0], $controller_action_array[1]))
                    ->setActive($currentAction === $controller_action_array[1])
            );
        }

        $this->moduleTemplate->getDocHeaderComponent()->getMenuRegistry()->addMenu($actionMenu);
    }

    protected function getModuleUri(?string $controller = null, ?string $action = null): string
    {
        return $this->uriBuilder->reset()->uriFor($action, null, $controller, 'mod1');
    }
}
