<?php

namespace Clob\Observers;

use Clob\MenuItem;

class MenuItemObserver
{
	/**
	 * Set position to 1 higher than the current max position
	 *
	 * @param \Clob\MenuItem $item
	 * @return void
	 */
	public function creating(MenuItem $item)
	{
		$item->position = MenuItem::max('position') + 1;
	}
}