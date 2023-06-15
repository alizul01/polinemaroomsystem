<?php

namespace App\View\Components\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProcessBody extends Component
{
  /**
   * Create a new component instance.
   */
  public $id;
  public $no;
  public $dateFiled;
  public $room;
  public $dateUse;
  public $status;

  public $issteponeapproved;
  public $isStep2Approved;
  public $isStep3Approved;
  public $isStep4Approved;

  public $reasonone;
  public $reasontwo;
  public $reasonthree;
  public $reasonfour;

  public function __construct(
    $id,
    $no,
    $dateFiled,
    $room,
    $dateUse,
    $status,
    $issteponeapproved = "",
    $isStep2Approved = "",
    $isStep3Approved = "",
    $isStep4Approved = "",
    $reasonone = "Dalam Proses",
    $reasontwo = "Dalam Proses",
    $reasonthree = "Dalam Proses",
    $reasonfour = "Dalam Proses"
  ) {
    $this->id = $id;
    $this->no = $no;
    $this->dateFiled = $dateFiled;
    $this->room = $room;
    $this->dateUse = $dateUse;
    $this->status = $status;

    $this->issteponeapproved = $issteponeapproved;
    $this->isStep2Approved = $isStep2Approved;
    $this->isStep3Approved = $isStep3Approved;
    $this->isStep4Approved = $isStep4Approved;

    $this->reasonone = $reasonone;
    $this->reasontwo = $reasontwo;
    $this->reasonthree = $reasonthree;
    $this->reasonfour = $reasonfour;
  }

  /**
   * Get the view / contents that represent the component.
   */
  public function render(): View|Closure|string
  {
    return view('components.table.process-body');
  }
}
