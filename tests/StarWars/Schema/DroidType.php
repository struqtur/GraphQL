<?php
/**
 * Date: 07.12.15
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace Youshido\Tests\StarWars\Schema;


use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\TypeMap;

class DroidType extends HumanType
{

    /**
     * @return String type name
     */
    public function getName(): string
    {
        return 'Droid';
    }

    public function build(ObjectTypeConfig $config): void
    {
        parent::build($config);

        $config->getField('friends')->getConfig()->set('resolve', static function ($droid) {
            return StarWarsData::getFriends($droid);
        });

        $config
            ->addField('primaryFunction', TypeMap::TYPE_STRING);
    }

    public function getInterfaces(): array
    {
        return [new CharacterInterface()];
    }
}
