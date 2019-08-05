<?php
$installer = $this;
$installer->startSetup();

$connection = $installer->getConnection();
$tableName = $installer->getTable('rede_adquirencia/transacoes');

$connection->dropTable($tableName);

$table = $connection->newTable($tableName);

$table->addColumn(
    'id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
    'identity' => true,
    'primary' => true,
    'nullable' => false
), 'Internal ID.'
)
    ->addColumn(
        'order_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'nullable' => false
    ), 'Reference Order ID.'
    )
    ->addColumn(
        'tid', Varien_Db_Ddl_Table::TYPE_VARCHAR, 100, array(
        'nullable' => true
    ), 'TID.'
    )
    ->addColumn(
        'cancel_id', Varien_Db_Ddl_Table::TYPE_VARCHAR, 100, array(
        'nullable' => true
    ), 'Cancel ID.'
    )
    ->addColumn(
        'refund_id', Varien_Db_Ddl_Table::TYPE_VARCHAR, 100, array(
        'nullable' => true
    ), 'Refund ID'
    )
    ->addColumn(
        'transaction_status', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'nullable' => true
    ), 'Transaction status from API.'
    )
    ->addColumn(
        'card_number', Varien_Db_Ddl_Table::TYPE_VARCHAR, 4, array(
        'nullable' => true
    ), 'Last 4 digits of the credit card.'
    )
    ->addColumn(
        'card_bin', Varien_Db_Ddl_Table::TYPE_VARCHAR, 6, array(
        'nullable' => true
    ), 'Last 6 digits of the credit card.'
    )
    ->addColumn(
        'cardholder_name', Varien_Db_Ddl_Table::TYPE_VARCHAR, 100, array(
        'nullable' => true
    ), 'Cardholder name.'
    )
    ->addColumn(
        'card_exp_year', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'nullable' => true
    ), 'Expiration year of the credit card.'
    )
    ->addColumn(
        'card_exp_month', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'nullable' => true
    ), 'Expiration month of the credit card.'
    )
    ->addColumn(
        'payment_method', Varien_Db_Ddl_Table::TYPE_VARCHAR, 100, array(
        'nullable' => true
    ), 'Payment Method.'
    )
    ->addColumn(
        'installments', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'nullable' => true,
    ), 'Installments.'
    )
    ->addColumn(
        'authorization_number', Varien_Db_Ddl_Table::TYPE_VARCHAR, 100, array(
        'nullable' => true
    ), 'Authorization number.'
    )
    ->addColumn(
        'nsu', Varien_Db_Ddl_Table::TYPE_VARCHAR, 100, array(
        'nullable' => true
    ), 'Unique sequential number.'
    )
    ->addColumn(
        'amount', Varien_Db_Ddl_Table::TYPE_DECIMAL, array(10, 2), array(
        'nullable' => true
    ), 'Amount.'
    )
    ->addColumn(
        'capture_amount', Varien_Db_Ddl_Table::TYPE_DECIMAL, array(10, 2), array(
        'nullable' => true
    ), 'Capture Amount.'
    )
    ->addColumn(
        'return_message', Varien_Db_Ddl_Table::TYPE_VARCHAR, 100, array(
        'nullable' => false
    ), 'Return Message from API.'
    )
    ->addColumn(
        'environment', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'nullable' => true
    ), 'Environment of the API.'
    )
    ->addColumn(
        'created_date', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
        'nullable' => true
    ), 'Created date.'
    )
    ->addColumn(
        'modified_date', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
        'nullable' => true
    ), 'Modified date.'
    )
    ->addColumn(
        'score', Varien_Db_Ddl_Table::TYPE_VARCHAR, 10, array(
        'nullable' => true
    ), 'Antifraud Score.'
    )
    ->addColumn(
        'risk_level', Varien_Db_Ddl_Table::TYPE_VARCHAR, 10, array(
        'nullable' => true
    ), 'Antifraud Risk Level.'
    )
    ->addColumn(
        'recommendation', Varien_Db_Ddl_Table::TYPE_VARCHAR, 100, array(
        'nullable' => true
    ), 'Antifraud Recommendation'
    );

$fields = array('order_id');
$idxType = Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE;
$idxName = $installer->getIdxName($tableName, $fields, $idxType);
$table->addIndex($idxName, $fields, array('type' => $idxType));

$refTable = $installer->getTable('sales/order');
$fkName = $installer->getFkName($tableName, 'order_id', $refTable, 'entity_id');
$actCscd = Varien_Db_Ddl_Table::ACTION_CASCADE;
$table->addForeignKey($fkName, 'order_id', $refTable, 'entity_id', $actCscd, $actCscd);

$connection->createTable($table);

$installer->endSetup();
