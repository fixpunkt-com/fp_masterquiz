﻿.. include:: /Includes.rst.txt

.. _changelog:

ChangeLog
=========

0.2.0:
  First release for the TER.

0.3.0:
  Now optimized for Bootstrap 4.
  New settings: showAnswersAtFinalPage and template.

0.4.0:
  Now polls possible, because all submited results are avaiable.
  New settings: showOwnAnswers, showAllAnswers, templateLayout...

0.5.0:
  Now for TYPO3 8 and 9. Backend module added. Charts added.
  Deletion-task changed: delete-flag and real deletion now possible.
  Lazy loading removed, because delete cascade does not work with lazy loading.
  New settings: showPageNo and showQuestionNo.

0.6.0:
  Donut chart added.
  Session-token added to prevent reload-manipulations.
  New settings: user.useCookie.

0.7.0:
  Text-answer now possible. Thanks to Gerald Loss.
  New settings: user.checkFEuser.
  Bug fixed: anonymous IP address.

1.0.0:
  Question mode "Show a comment" and "Star rating" implemented.

1.1.0:
  Question mode "Enter a comment (textarea)" implemented.
  New settings: checkAllStars.
  Sending of emails now possible.
  Using of FE-user-data, if user.checkFEuser is set.
  Dropped support for TYPO3 8. Now for TYPO3 9 and 10.

1.2.0:
  New feature: 50:50 joker.
  Page layout view / preview in the backend.
  Bugfix: summation of points works now with negative points too.
  Bugfix: FlexForms in TYPO3 10.
  Bugfix: hidden-fields in the backend.

1.3.0:
  New setting: ajaxType.
  New setting: email.likeFinalPage.
  New settings: showEveryAnswer and option 2 for showOwnAnswers and showCorrectAnswers.
  Bugfix: sending of emails.

1.4.0:
  New setting: resultPageUid and new action: result for a result page.
  Possibility added to add a question to a quiz via backend module.
  Question mode "Yes/no-boxes (2 radio-buttons)" implemented.
  Important bugfix for PHP 7.3 and other bugfixes points related.

1.5.0:
  Bodytext and image added to the evaluation.
  Routing/slug/path segment added to a quiz.
  Categories added to a quiz.
  Layout of yes/no-questions changed.
  New settings: setMetatags.
  Sorting of selected answers of a participant: using now an array instead of an object.
  Another bugfix points related.
  See issues #12 - #18.

2.0.0:
  The ajax-action gets now the quiz-object.
  Media-field added to a quiz.
  Default value of the setting showAnswersAtFinalPage and showAllAnswers changed from 0 to 1.
  Default value of the setting showOwnAnswers changed from 1 to 2.
  Default value of startPageUid removed! Setting showPageUid added.
  Shows now the points only if the maximum points are greater than 0.
  jQuery can now be loaded in the footer.
  Important: probably you need to flush all caches.

2.1.0:
  Highscore action added.
  Explanation added to the result action/view.
  Completed-field added: final page reached?
  Deutsche Übersetzungen.
  Bugfix for TYPO3 10.
  Important: probably you need to flush all caches.

2.2.0:
  showByTag action added. Tag for a question added.
  intro action and settings introContentUid, introNextAction added.
  Showing all answers of a text-answer in the chart in the backend.
  Showing the start and end time in the backend.
  A time period can be defined for a quiz and/or a tag.
  TCA-Bugfix for TYPO3 10.
  Refactoring.

3.0.0/2:
  Version for TYPO3 10 and 11.
  closure action and setting closurePageUid added.
  Default-value for setting ajaxType changed from POST to GET.
  Language of a participant and his answers changed from 0 to -1.
  Breaking: myquizpoll-import-task removed.

3.1.1:
  Setting user.useQuizPid, noFormCheck, random and allowEdit added.
  Possibility added to move questions from one quiz to another quiz.
  More Flexforms.

3.1.2:
  Bugfix for breaking change in TYPO3 11.5.0.

3.2.0:
  Every question can now be set to be optional. Setting template.optionalMark added.
  The answer of text-fields is now checked too (it is no longer optional, but can be set to optional).
  The RatingStar.css will now be included by the viewhelper f:asset in the template itself. Use includeRatingCSS=0 to disable it.
  Setting template.col12 added for questions without an image.
  Div with class card-body added to all cards.
  Variable participant.username added.

3.3.0/1:
  Backend-Layout adapted for TYPO3 11.5.
  Evaluation of the most used category is now possible too. Setting showDetailedCategoryEvaluation added.
  TYPO3 categories are now available at a quiz, question, answer, selected and evaluation.
  Mandatory questions are now marked when an error appears. The error message is now not a JavaScript-alert-message.
  2 widgets for the TYPO3 dashboard added (the extension dashboard is required in TYPO3 11).
  Supports now PHP 8; thanks to Gerald Loss.
  Bugfix: moving participant data to another folder.
  Bugfix: check of checkboxes fixed.

3.4.0:
  The answer of textarea-fields is now checked too (it is no longer optional, but can be set to optional).
  CSV-export added as scheduler task.
  Dashboard no longer required in TYPO3 11.
  Layout optimizations.

3.4.4:
  Bugfix: persist data before evaluation.
  Bugfix: category evaluation.
  Bugfix: wrong Namespace in TemplateLayout corrected.

3.5.0/1:
  Mandatory check with PHP too, if setting phpFormCheck=1.
  New question mode: matrix with categories of a question.

3.5.2:
  Security fix: checking participant against a session-key. Please read the section Administrator / Security fix in version 3.5.2.
  Security fix: check if a quiz/poll is allowed on a page. Therefore, the defaultQuizUid was removed in the settings!

3.5.5:
  Replaced invocation of PersistenceManager with DI #46.
  Reformatting source code and PHP 8 bugfix.
  Bugfix: optional checkbox was not clickable.

3.6.0:
  Tabs introduced to a quiz entry in the backend. Questions and evaluations are now collapsed.
  Setting closed added: participation is than not possible.
  Type added to a quiz-entry.
  Bugfix sending emails and adminEmail can now contain more email-addresses and in debug mode the email-content will be prompted.
  Bugfix for other languages than 0 and PHP 8 bugfix.

3.7.0:
  Closed-checkbox added to a quiz too.
  Using a target-action at the list-view.
  New FE-layout for results: detailed table-list.
  allowEdit = 2 is new (allow edit even the status is completed).
  Bugfix: delete old selections when they are replaced in the edit mode.
  Bugfix: do not ignore changed user-data in edit mode.

3.7.1:
  Absolute path to images in emails.
  debug-echo removed.
  PHP 8 bugfix.

4.0:
  Breaking: all plugins must be changed via an update-script (in the install-tool)!

  TypoScript module.tx_fpmasterquiz_web_fpmasterquizmod1 changed to module.tx_fpmasterquiz.

  Note for the Ajax-version: maybe you need to change the value of "ajaxfpmasterquiz_page.10.pluginName".

4.1:
  TypoScript-files renamed from .ts to .typoscript.

  Prevent PHP and JavaScript errors from missing settings.

  Upgrade Wizard for old file references.

4.2:
  Questions can now be closed too.

  Bugfix for: prevent PHP and JavaScript errors from missing settings.

4.3:
  Setting redirectToResultPageAtFinal added: redirect to the result page when the final page is reached?

  Setting pointsMode added: 0 points if not all answers are correct now possible.

5.0:
  Refactoring with the rector-tool.

  settings.debug=2 is new. If 2 instead of 1, the debug output will be written into a log file.

  settings.user.checkFEuser allows now values greater than 1.

  Bugfix for settings.pointsMode 4.

5.0.3:
  Bugfix: prevent multiple ajax calls.

  Bugfix: Matrix-Display.

5.1:
  More layout possibilities: group a normal quiz/poll by tags; show answers inline (span instead of div).

5.1.4:
  More support for group by tags.

  More support for matrix-questions.

5.1.6:
  Bugfix: backend preview.

  Remove of deprecated methods and sql-fields.

5.1.7:
  Bugfix: sorting-error of selected-table.

5.1.8:
  Bugfix: translations in Ajax-mode.

5.1.9:
  Bugfix: points calculation for modes 3 and 4.

5.1.10/1:
  Bugfix: allow backend-module for users.

5.2.0:
  Refactoring with the rector-project.

  Preparations for TYPO3 13. Attention: the path to the backend templates is now defined in Configuration/page.tsconfig.

6.0.0:
  First version for TYPO3 13, but emails are not working with TYPO3 13!

  Upgrade Wizards for old file references and Switchable-Controller-Action-Plugins removed!

6.0.1:
  Upgrade Wizards for Switchable-Controller-Action-Plugins added again, so it can be used with TYPO3 13 too.

6.1.0:
  Support for TYPO3 12 dropped!

  The emails work now with TYPO3 13 too, and they are now localized too.

6.1.1:
  Bugfix: tasks fixed.

7.0.0:
  Breaking: PlugIns changed from list_type to CType. You need to execute the Upgrade Wizard to change your PlugIns.

  Breaking: due to a TYPO3 bug (issues/105135), the Ajax-Version is not working anymore!

  Breaking: layout changed: fieldset added to questions and user data in the form and settings.wrapQuestionTitle1 changed to legend.

  Documentation translated to german.

7.0.1:
  Bugfix: the Ajax-version is now working again.

7.0.4/5:
  Bugfix: get FE-users entry + get foreign entries.

  Layout: added class text-end where text-right is used.

7.0.6:
  Startingpoint added again to a plugin.

  pluginName in the list-view changed to show, if a target page is defined.

  Bugfix: documentation.

7.1.0:
  Refactoring with the Rector-tool. You need to use "Flush TYPO3 and PHP Cache".

  PageTitleProvider added.

  Documentation again.

7.1.1/2:
  PHP 8.4 Bugfix.

  New home url: https://github.com/fixpunkt-com/fp_masterquiz

7.2.0:
  Extension configuration file added for the ajax mode.

7.2.1:
  PHP 8.4 Bugfix.

7.2.2:
  Update script for permissions added.

7.2.3:
  Prevent of sending empty input field with enter.
