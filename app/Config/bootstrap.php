<?php
// Setup a 'default' cache configuration for use in the application.
Cache::config('default', array('engine' => 'File'));

Configure::write('Dispatcher.filters', array(
	'AssetDispatcher',
	'CacheDispatcher'
));

/**
 * Configures default file logging options
 */
App::uses('CakeLog', 'Log');
CakeLog::config('debug', array(
	'engine' => 'FileLog',
	'types' => array('notice', 'info', 'debug'),
	'file' => 'debug',
));
CakeLog::config('error', array(
	'engine' => 'FileLog',
	'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
	'file' => 'error',
));

Inflector::rules('singular', array(
	'uninflected' => array('barang')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('barang')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('bayar_bon')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('bayar_bon')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('d_bon')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('d_bon')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('d_nota_bawa')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('d_nota_bawa')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('d_nota_retur')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('d_nota_retur')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('d_nota_tunai')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('d_nota_tunai')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('d_order')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('d_order')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('d_pembelian')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('d_pembelian')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('d_rencana_beli')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('d_rencana_beli')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('d_retur_beli')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('d_retur_beli')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('d_stock_opname')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('d_stock_opname')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('d_transfer')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('d_transfer')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('d_transfer_kembali')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('d_transfer_kembali')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('diskon')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('diskon')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('komisi')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('komisi')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('lokasi')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('lokasi')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('lokasi_barang')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('lokasi_barang')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('m_bon')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('m_bon')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('m_nota_bawa')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('m_nota_bawa')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('m_nota_retur')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('m_nota_retur')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('m_nota_tunai')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('m_nota_tunai')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('m_order')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('m_order')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('m_pembelian')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('m_pembelian')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('m_rencana_beli')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('m_rencana_beli')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('m_retur_beli')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('m_retur_beli')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('m_stock_opname')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('m_stock_opname')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('m_transfer')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('m_transfer')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('m_transfer_kembali')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('m_transfer_kembali')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('no_barang')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('no_barang')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('pelanggan')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('pelanggan')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('retur_bon_lama')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('retur_bon_lama')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('setup')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('setup')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('setuppromo')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('setuppromo')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('tempak7')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('tempak7')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('tempak7rinci')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('tempak7rinci')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('mddb')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('mddb')
	)
);
Inflector::rules('singular', array(
	'uninflected' => array('waktusyncakhir')
	)
);
Inflector::rules('plural', array(
	'uninflected' => array('waktusyncakhir')
	)
);