<?php

namespace Oro\ORM\Query\AST\Platform\Functions\Postgresql;

use Doctrine\ORM\Query\AST\Node;
use Doctrine\ORM\Query\SqlWalker;
use Oro\ORM\Query\AST\Functions\String\Regexp as BaseFunction;
use Oro\ORM\Query\AST\Platform\Functions\PlatformFunctionNode;

class Regexp extends PlatformFunctionNode
{
    /**
     * {@inheritdoc}
     */
    public function getSql(SqlWalker $sqlWalker)
    {
        /** @var Node $date */
        $subject = $this->parameters[BaseFunction::SUBJECT_KEY];
        /** @var Node $format */
        $regexp = $this->parameters[BaseFunction::REGEXP_KEY];

        return '('
            . $this->getExpressionValue($subject, $sqlWalker)
            . ' ~ '
            . $this->getExpressionValue($regexp, $sqlWalker)
        . ')';
    }
}
