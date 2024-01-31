<?php
namespace Frithjof\Cmsnoindex\Plugin;



use Magento\Framework\View\Page\Config as PageConfig;
use Magento\Framework\View\Page\Config\Renderer;
use Magento\Framework\App\Request\Http;
use Magento\Cms\Model\Page;

class NoindexRender
{

    /**
     * @var PageConfig
     */
    protected $pageConfig;

    /**
     * @var Http
     */
    protected $request;

    /**
     * @var Page
     */
    protected $cmsPage;


    /**
     * @param PageConfig $pageConfig
     * @param Http $request
     */
    public function __construct(
        PageConfig $pageConfig,
        Http $request,
        Page $cmsPage,
    ) {
        $this->pageConfig          = $pageConfig;
        $this->request             = $request;
        $this->cmsPage             = $cmsPage;
    }

    /**
     * @param Renderer $subject
     */
    public function beforeRenderMetadata(Renderer $subject)
    {
        if($this->cmsPage->getData('noindex') === '1') $this->pageConfig->setMetadata('robots', 'NOINDEX,NOFOLLOW');
    }
}
