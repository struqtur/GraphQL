<?php
/**
 * Date: 3/24/17
 *
 * @author Volodymyr Rashchepkin <rashepkin@gmail.com>
 */

namespace Youshido\GraphQL\Directive;


class DirectiveLocation
{

    final const QUERY = 'QUERY';

    final const MUTATION = 'MUTATION';

    final const FIELD = 'FIELD';

    final const FIELD_DEFINITION = 'FIELD_DEFINITION';

    final const FRAGMENT_DEFINITION = 'FRAGMENT_DEFINITION';

    final const FRAGMENT_SPREAD = 'FRAGMENT_SPREAD';

    final const INLINE_FRAGMENT = 'INLINE_FRAGMENT';

    final const ENUM_VALUE = 'ENUM_VALUE';
}
