<?php

namespace Clob\Repositories;

use Carbon\Carbon;
use Clob\MenuItem;
use Clob\Repositories\Options as OptionRepository;
use Clob\User;

class MenuItems extends Repository
{
	/*
    |--------------------------------------------------------------------------
    | Pages Repository
    |--------------------------------------------------------------------------
    |
    | This class handles interacting with pages data in the database.
    |
    */

    /**
     * Repository constructor
     * Inject the OptionRepository so we can read options from the database.
     *
     * @param \Clob\Repositories\Options $options
     * @return void
     */
    public function __construct(OptionRepository $options)
    {
        $this->options = $options->getBlogSettings();
    }

    /**
     * Get all menu items by position.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
    	return MenuItem::orderBy('position')->get();
    }

    /**
     * Set page data values from passed array.
     *
     * @param \Clob\MenuItem $item
     * @param array $data
     * @return \Clob\MenuItem
     */
    private function setItemData(MenuItem $item, $data)
    {
        $item->label = $data['label'];
        $item->menuable_type = $data['menuable_type'];

        if($data['menuable_id']) {
            $item->menuable_id = $data['menuable_id'];
        } else {
            $item->menuable_id = null;
        }

        if($data['url']) {
            $item->url = $data['url'];
        } else {
            $item->url = null;
        }

        return $item;
    }

    /**
     * Create a new page.
     *
     * @param \Clob\User $user
     * @param array $data
     * @return \Clob\MenuItem
     */
    public function create($data)
    {
        $item = $this->setItemData(new MenuItem, $data);
        $item->save();

        return $item;
    }

    /**
     * Update an existing page.
     *
     * @param \Clob\MenuItem $item
     * @param array $data
     * @return \Clob\MenuItem
     */
    public function update(MenuItem $item, $data)
    {
        $item = $this->setItemData($item, $data);
        $item->save();

        return $item;
    }

    /**
     * Rearrange item order by moving item up/down.
     *
     * @param \Clob\MenuItem $item
     * @param string $direction
     * @return void
     */
    public function rearrange(MenuItem $item, $direction)
    {
        $all = MenuItem::orderBy('position')->get();
        $pos = $all->search($item);

        if(($pos !== 0 && $direction === 'up') || ($pos !== $all->count()-1 && $direction === 'down')) {
            $reordered = [];

            foreach($all as $key => $i) {
                if($direction === 'up' && $key === $pos - 1) {
                    $reordered[] = $item;
                    $reordered[] = $i;
                } elseif($direction === 'down' && $key === $pos + 1) {
                    $reordered[] = $i;
                    $reordered[] = $item;
                } elseif($key !== $pos) {
                    $reordered[] = $i;
                }
            }

            foreach($reordered as $i => $obj) {
                $obj->position = $i+1;
                $obj->save();
            }
        }
    }

    /**
     * Delete an existing page.
     *
     * @param \Clob\MenuItem $item
     * @return void
     */
    public function delete(MenuItem $item)
    {
        $item->delete();

        // Rearrange position attribute of remaining items.
        $all = MenuItem::orderBy('position')->get();

        foreach($all as $i => $obj) {
            $obj->position = $i+1;
            $obj->save();
        }
    }
}