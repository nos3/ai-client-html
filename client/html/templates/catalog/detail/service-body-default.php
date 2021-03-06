<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2016
 */

$enc = $this->encoder();
$items = $this->get( 'serviceItems', [] );

?>
<?php $this->block()->start( 'catalog/detail/service' ); ?>
<div class="catalog-detail-service">
	<span class="service-intro"><?php echo $enc->html( $this->translate( 'client', '+ shipping costs' ) ); ?></span>

	<?php if( !empty( $items ) ) : ?>
		<ul class="service-list">

			<?php foreach( $items as $item ) : ?>

				<li class="service-item">
					<span class="service-name"><?php echo $enc->html( $item->getName() ); ?></span>

					<?php echo $this->partial(
						$this->config( 'client/html/common/partials/price', 'common/partials/price-default.php' ),
						array( 'prices' => $item->getRefItems( 'price', null, 'default' ), 'costsItem' => false )
					); ?>

					<?php foreach( $item->getRefItems( 'text', 'short', 'default' ) as $textItem ) : ?>
						<span class="service-short"><?php echo $enc->html( $textItem->getContent() ); ?></span>
					<?php endforeach; ?>
				</li>

			<?php endforeach; ?>

		</ul>
	<?php endif; ?>

</div>
<?php $this->block()->stop(); ?>
