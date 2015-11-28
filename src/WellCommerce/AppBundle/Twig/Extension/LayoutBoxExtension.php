<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 *
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */
namespace WellCommerce\AppBundle\Twig\Extension;

use WellCommerce\AppBundle\Service\LayoutBox\Renderer\LayoutBoxRendererInterface;

/**
 * Class LayoutBoxExtension
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class LayoutBoxExtension extends \Twig_Extension
{
    /**
     * @var LayoutBoxRendererInterface
     */
    protected $renderer;

    /**
     * Constructor
     *
     * @param LayoutBoxRendererInterface $renderer
     */
    public function __construct(LayoutBoxRendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('layout_box', [$this, 'getLayoutBoxContent'], ['is_safe' => ['html']]),
        ];
    }

    /**
     * Returns layout box content
     *
     * @param string $identifier
     * @param array  $params
     *
     * @return string
     */
    public function getLayoutBoxContent($identifier, $params = [])
    {
        return $this->renderer->render($identifier, $params);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'layout_box';
    }
}
