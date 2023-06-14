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

  public $isStep1Approved;
  public $isStep2Approved;
  public $isStep3Approved;
  public $isStep4Approved;

  public $reason1;
  public $reason2;
  public $reason3;
  public $reason4;

  public function __construct(
    $id,
    $no,
    $dateFiled,
    $room,
    $dateUse,
    $status,
    $isStep1Approved = "",
    $isStep2Approved = "",
    $isStep3Approved = "",
    $isStep4Approved = "",
    $reason1 = "Dalam Proses",
    $reason2 = "Dalam Proses",
    $reason3 = "Dalam Proses",
    $reason4 = "Dalam Proses"
  ) {
    $this->id = $id;
    $this->no = $no;
    $this->dateFiled = $dateFiled;
    $this->room = $room;
    $this->dateUse = $dateUse;
    $this->status = $status;

    $this->isStep1Approved = $isStep1Approved;
    $this->isStep2Approved = $isStep2Approved;
    $this->isStep3Approved = $isStep3Approved;
    $this->isStep4Approved = $isStep4Approved;

    $this->reason1 = $reason1;
    $this->reason2 = $reason2;
    $this->reason3 = $reason3;
    $this->reason4 = $reason4;
  }

  /**
   * Get the view / contents that represent the component.
   */
  public function render(): View|Closure|string
  {
    return view('components.table.process-body');
  }
}
