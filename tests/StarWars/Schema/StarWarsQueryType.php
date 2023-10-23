<?php
/**
 * Date: 07.12.15
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace Youshido\Tests\StarWars\Schema;


use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Exception\ConfigurationException;
use Youshido\GraphQL\Field\Field;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\IdType;

class StarWarsQueryType extends AbstractObjectType
{

    /**
     * @return String type name
     */
    public function getName(): string
    {
        return 'Query';
    }

    /**
     * @throws ConfigurationException
     */
    public function build(ObjectTypeConfig $config): void
    {
        $config
            ->addField('hero', [
                'type'    => new CharacterInterface(),
                'args'    => [
                    'episode' => ['type' => new EpisodeEnum()]
                ],
                'resolve' => static function ($root, array $args) {
                    return StarWarsData::getHero($args['episode'] ?? null);
                },
            ])
            ->addField(new Field([
                'name'    => 'human',
                'type'    => new HumanType(),
                'args'    => [
                    'id' => new IdType()
                ],
                'resolve' => static function ($value = null, array $args = []) {
                    $humans = StarWarsData::humans();
                    return $humans[$args['id']] ?? null;
                }
            ]))
            ->addField(new Field([
                'name'    => 'droid',
                'type'    => new DroidType(),
                'args'    => [
                    'id' => new IdType()
                ],
                'resolve' => static function ($value = null, array $args = []) {
                    $droids = StarWarsData::droids();
                    return $droids[$args['id']] ?? null;
                }
            ]));
    }
}
