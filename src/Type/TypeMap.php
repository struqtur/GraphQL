<?php
/*
* This file is a part of graphql-youshido project.
*
* @author Alexandr Viniychuk <a@viniychuk.com>
* created: 11/30/15 12:36 AM
*/

namespace Youshido\GraphQL\Type;

class TypeMap
{
    final const KIND_SCALAR = 'SCALAR';

    final const KIND_OBJECT = 'OBJECT';

    final const KIND_INTERFACE = 'INTERFACE';

    final const KIND_UNION = 'UNION';

    final const KIND_ENUM = 'ENUM';

    final const KIND_INPUT_OBJECT = 'INPUT_OBJECT';

    final const KIND_LIST = 'LIST';

    final const KIND_NON_NULL = 'NON_NULL';

    final const TYPE_INT = 'int';

    final const TYPE_FLOAT = 'float';

    final const TYPE_STRING = 'string';

    final const TYPE_BOOLEAN = 'boolean';

    final const TYPE_ID = 'id';

    final const TYPE_DATETIME = 'datetime';

    final const TYPE_DATETIMETZ = 'datetimetz';

    final const TYPE_DATETIME_AS_STRING = 'datetimeasstring';

    final const TYPE_DATE = 'date';

    final const TYPE_TIMESTAMP = 'timestamp';

    final const TYPE_STRING_OR_ARRAY = 'stringorarray';
}
