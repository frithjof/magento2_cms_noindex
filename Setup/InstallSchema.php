<?php

namespace Frithjof\Cmsnoindex\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        if(version_compare($context->getVersion(), '1.0.0', '<')) {
            $this->addCheckboxField($setup);
        }
    }

    protected function addCheckboxField(SchemaSetupInterface $setup)
    {
        $connection = $setup->getConnection();

        $connection->addColumn(
            $setup->getTable('cms_page'),
            'noindex',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
                'nullable' => true,
                'comment' => 'exclude from robots',
            ]
        );

        return $this;
    }
}
