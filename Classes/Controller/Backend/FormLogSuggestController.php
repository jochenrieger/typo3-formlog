<?php
declare(strict_types = 1);

namespace Pagemachine\Formlog\Controller\Backend;

/*
 * This file is part of the Pagemachine TYPO3 Formlog project.
 */

use Pagemachine\Formlog\Domain\FormLog\Suggestions;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Controller for form log suggestions
 */
class FormLogSuggestController
{
    /**
     * @var Suggestions
     */
    protected $suggestions;

    /**
     * @param Suggestions|null $suggestions
     */
    public function __construct(Suggestions $suggestions = null)
    {
        $this->suggestions = $suggestions ?: GeneralUtility::makeInstance(Suggestions::class);
    }

    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @return ResponseInterface
     */
    public function searchAction(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $body = (array)$request->getParsedBody();
        $suggestions = $this->suggestions->getForProperty($body['property']);
        $response->getBody()->write(json_encode($suggestions));

        return $response;
    }
}
