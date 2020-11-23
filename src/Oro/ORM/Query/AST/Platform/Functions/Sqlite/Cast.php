<?php

namespace Oro\ORM\Query\AST\Platform\Functions\Sqlite;

use Doctrine\ORM\Query\AST\Node;
use Doctrine\ORM\Query\SqlWalker;
use Oro\ORM\Query\AST\Functions\Cast as DqlFunction;
use Oro\ORM\Query\AST\Platform\Functions\PlatformFunctionNode;

class Cast extends PlatformFunctionNode
{
    /**
     * {@inheritdoc}
     */
    public function getSql(SqlWalker $sqlWalker)
    {
        /** @var Node $value */
        $value = $this->parameters[DqlFunction::PARAMETER_KEY];

        $expression = sprintf(
            'REPLACE(REPLACE(%s, %s, %s), %s, %s)',
            $this->getExpressionValue($value, $sqlWalker),
            '\'1\'',
            '\'true\'',
            '\'0\'',
            '\'false\''
        );

        return $expression;
    }
}