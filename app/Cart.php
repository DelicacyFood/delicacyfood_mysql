<?php

namespace App;

class Cart
{
  public $items = null;
  public $totalQty = 0;
  public $totalPrice = 0;

  public function __construct($oldCart)
  {
    if ($oldCart) {
      $this->items = $oldCart->items;
      $this->totalQty = $oldCart->totalQty;
      $this->totalPrice = $oldCart->totalPrice;
    }
  }

  public function add($item, $id, $jumlah_order)
  {
    $storedItem = ['qty' => $jumlah_order, 'price' => $item->harga_menu, 'item' => $item];
    if ($this->items) {
      if (array_key_exists($id, $this->items)) {
        $storedItem = $this->items[$id];
      }
    }
    $storedItem['price'] = $item->harga_menu * $storedItem['qty'];
    // $storedItem['qty'] += $jumlah_order;
    $this->items[$id] = $storedItem;
    $this->totalQty += $jumlah_order;
    $this->totalPrice += $storedItem['price'];
  }

  public function removeItem($menu_id)
  {
    $this->totalQty -= $this->items[$menu_id]['qty'];
    $this->totalPrice -= $this->items[$menu_id]['price'];
    unset($this->items[$menu_id]);
  }
}
