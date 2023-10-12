<?php
/**
 * Date: 5/20/16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace Youshido\GraphQL\Execution\Context;


use Youshido\GraphQL\Execution\Container\ContainerInterface;
use Youshido\GraphQL\Execution\Request;
use Youshido\GraphQL\Schema\AbstractSchema;
use Youshido\GraphQL\Validator\ErrorContainer\ErrorContainerInterface;

interface ExecutionContextInterface extends ErrorContainerInterface
{

    /**
     * @return AbstractSchema
     */
    public function getSchema();

    /**
     * @return $this
     */
    public function setSchema(AbstractSchema $schema);

    /**
     * @return Request
     */
    public function getRequest();

    /**
     * @return $this
     */
    public function setRequest(Request $request);

    /**
     * @return ContainerInterface
     */
    public function getContainer();

    /**
     * @return mixed
     */
    public function setContainer(ContainerInterface $container);

}
