<?php

namespace App\View\Components\Table;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProcessBody extends Component
{
  public $id;
  public $no;
  public $dateFiled;
  public $room;
  public $dateUse;
  public $status;

  public $isStepOneApproved;
  public $isStepTwoApproved;
  public $isStepThreeApproved;
  public $isStepFourApproved;

  public $approvedAtOne;
  public $approvedAtTwo;
  public $approvedAtThree;
  public $reasonFour;

  public function __construct(
    $id,
    $no,
    $dateFiled,
    $room,
    $dateUse,
    $status,
    $isStepOneApproved,
    $isStepTwoApproved,
    $isStepThreeApproved,
    $isStepFourApproved,
    $approvedAtOne,
    $approvedAtTwo,
    $approvedAtThree,
    $reasonFour
  ) {
    $this->id = $id;
    $this->no = $no;
    $this->dateFiled = $dateFiled;
    $this->room = $room;
    $this->dateUse = $dateUse;
    $this->status = $status;

    $this->isStepOneApproved = $isStepOneApproved;
    $this->isStepTwoApproved = $isStepTwoApproved;
    $this->isStepThreeApproved = $isStepThreeApproved;
    $this->isStepFourApproved = $isStepFourApproved;

    $this->approvedAtOne = $approvedAtOne;
    $this->approvedAtTwo = $approvedAtTwo;
    $this->approvedAtThree = $approvedAtThree;
    $this->reasonFour = $reasonFour;
  }


  public function render(): View|Closure|string
  {
    return view('components.table.process-body');
  }
}
