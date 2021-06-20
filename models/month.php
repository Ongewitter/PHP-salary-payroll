<?php
  class Month {
    var $name;
    var $payDate;
    var $bonusDate;

    function __construct($date) {
      $this->name = date('F', $date);
      $this->payDate = $this->payDate($date);
      $this->bonusDate = $this->bonusDate($date);
    }

    function payDate($date) {
      return strtotime('last weekday next month' . date("F Y", $date));
    }

    function bonusDate($date) {
      $fifteenth = strtotime('+14 day', $date);

      if(date('N', $fifteenth) >= 6) {
        return strtotime('next Wednesday', $fifteenth);
      }

      return $fifteenth;
    }

    function toString() {
      return $this->name . ',' . date('d', $this->payDate) . ',' . date('d', $this->bonusDate);
    }
  }
?>