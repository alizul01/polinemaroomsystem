<?php

namespace App\View\Components\Dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardRoom extends Component
{
  /**
   * Create a new component instance.
   */
  public $id;
   public $name;
    public $code;
    public $capacity;
    public $floor;
    public $image;
    public $status;
  public $room;
  public function __construct($name, $code, $capacity, $floor, $image, $status, $id, $room)
  {
    $this->name = $name;
    $this->code = $code;
    $this->capacity = $capacity;
    $this->floor = $floor;
    $this->image = $image;
    $this->status = $status;
    $this->id = $id;
    $this->room = $room;
  }

  /**
   * Get the view / contents that represent the component.
   */
  public function render(): View|Closure|string
  {
    return view('user.partials.components.card-room');
  }
}
