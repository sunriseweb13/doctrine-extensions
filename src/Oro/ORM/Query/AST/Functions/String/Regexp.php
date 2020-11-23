<?php

namespace Oro\ORM\Query\AST\Functions\String;

use Doctrine\ORM\Query\Parser;
use Doctrine\ORM\Query\Lexer;

use Oro\ORM\Query\AST\Functions\AbstractPlatformAwareFunctionNode;

class Regexp extends AbstractPlatformAwareFunctionNode
{
    const SUBJECT_KEY = 'subject';
    const REGEXP_KEY = 'regexp';

    /**
     * {@inheritdoc}
     */
    public function parse(Parser $parser)
    {
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);
        //$this->value = $parser->StringPrimary();
        $this->parameters[self::SUBJECT_KEY] = $parser->StringPrimary();
        $parser->match(Lexer::T_COMMA);
        //$this->regexp = $parser->StringExpression();
        $this->parameters[self::REGEXP_KEY] = $parser->StringExpression();
        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }
}
